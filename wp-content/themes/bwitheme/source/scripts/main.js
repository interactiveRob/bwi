import ParkingData from "@/modules/ParkingData";

document.addEventListener('DOMContentLoaded', () => {

   requestAnimationFrame(()=>{
      ParkingData.init()
   });
});

window.addEventListener('load', () => {

});
