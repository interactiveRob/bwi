export let mixin = () => {

   let state = {
      timestamp: null,
      data: null,
      dataPoints: document.querySelectorAll(`[data-realtime]`),
   };

   let module = {
      fillTimestamp(element){
         element.innerHTML = state.timestamp;

         requestAnimationFrame(()=>{
            element.classList.add('js-is-ready');
         });
      },

      reveal(element){
         let container = element.closest(`[data-realtime-container]`);
         if(!container) return;

         requestAnimationFrame(()=>{
            container.classList.add('js-is-ready');
         });
      },

      fillContentFromGroup(element, key){
         let parts = key.split('__');
               
         let group = state.data[parts[0]];
         if(!Object.keys(group).length) return;
         
         let content = group[parts[1]];
         if(typeof content == 'undefined' || content == null) return;

         element.innerHTML = content;
         this.reveal(element);
      },

      fillData(){
         [...state.dataPoints].map((point)=>{
            let key = point.dataset.key;

            if(key == 'timestamp'){
               this.fillTimestamp(point);
            }

            if(key.includes('__')){
               this.fillContentFromGroup(point, key);
            }
         });
      },

      fetchData(){
         fetch(`/wp-content/themes/bwitheme/ajaxcall.php?action=get_parking_data`, {
               method: 'POST',
               headers: {
                  "Content-Type": "application/json",
               },
         })
         .then((response) => {
               return response.json();
         })
         .then((json) => {
               this.onFetchSuccess(json);
         })
         .catch((errMsg) => {
               console.log(errMsg);
         });
      },

      onFetchSuccess(data) {
         state.data = data.parkingAvailability.lots;
         state.timestamp = data.parkingAvailability.updated;
         
         this.fillData();
      },

      init() {
         if(!state.dataPoints.length) return;
         this.fetchData();
      },
   };

   return module.init();
};

export default {
   init() {
      return mixin();
   },
};
