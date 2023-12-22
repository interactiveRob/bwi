<div class="hud_item hud_item_1 hud_item_flights">
    <div class="hud_item_body">
        <header class="hud_header">
            <h2 class="hud_title">Find a Flight</h2>
        </header>
        <div class="hud_flights">
            <form class="hud_flight_form"
                  action="/flying-with-us/flights/arrivals"
                  method="GET"><label class="hud_flight_label"
                       for="hud_flight_input">Flight Number</label>
                <input id="hud_flight_input"
                       class="hud_flight_input"
                       name="flight"
                       type="text"
                       placeholder="Search by Flight Number" />
                <div class="hud_flight_radio_group">
                    <div>
                        <div class="fs-checkbox fs-light fs-checkbox-radio fs-checkbox-checked">
                            <div class="fs-checkbox-marker"
                                 aria-hidden="true">

                                <input id="hud_arrival"
                                       class="fs-checkbox-element"
                                       checked="checked"
                                       name="hud_arrival_depature"
                                       type="radio"
                                       value="arrival" />
                                <div class="fs-checkbox-flag"></div>
                            </div>
                            <label class="fs-checkbox-label"
                                   for="hud_arrival">Arrival</label>
                        </div>
                    </div>
                    <div>
                        <div class="fs-checkbox fs-light fs-checkbox-radio">
                            <div class="fs-checkbox-marker"
                                 aria-hidden="true">

                                <input id="hud_departure"
                                       class="fs- checkbox-element"
                                       name="hud_arrival_depature"
                                       type="radio"
                                       value="departure" />
                                <div class="fs-checkbox-flag"></div>
                            </div>
                            <label class="fs-checkbox-label"
                                   for="hud_departure">Departure</label>
                        </div>
                    </div>
                </div>
                <div class="fs-dropdown_wrapper hud_flight_date hud_flight_dropdown_wrapper">
                    <div id="fs-dropdown__0-dropdown"
                         class="fs-dropdown fs-light "
                         tabindex="0"
                         role="listbox"
                         aria-haspopup="true"
                         aria-=""
                         aria-labelledby="fs-dropdown__0-dropdown-selected"><select
                                class="js-dropdown hud_flight_dropdown fs-dropdown-element"
                                tabindex="-1"
                                name="date"
                                aria-hidden="true"></select>
                        <button id="fs-dropdown__0-dropdown-selected"
                                class="fs-dropdown-selected"
                                tabindex="-1"
                                type="button">Thu, May 12</button>
                        <div class="fs-dropdown-options fs-scrollbar-element fs-scrollbar fs-light">
                            <div class="fs-scrollbar-bar"
                                 style="height: 0px;">
                                <div class="fs-scrollbar-track fs-touch-element"
                                     style="touch-action: pan-x; height: 0px; margin-bottom: 0px; margin-top: 0px;">
                                </div>
                            </div>
                            <div class="fs-scrollbar-content"></div>
                        </div>
                    </div>
                </div>
                <button class="hud_flight_submit"
                        type="submit"><span
                          class="hud_flight_submit_inner"><span class="hud_flight_submit_label">Find Flight</span><span
                          class="hud_flight_submit_icon"><svg aria-hidden="true" class="symbol symbol_arrow_right symbol_gray"><use xlink:href="#arrow_right"></use></svg></span></span></button>
            </form>
        </div>
        <footer class="hud_links"><a class="hud_link_text"
               href="/flying-with-us/flights/arrivals"><span>View Arrivals</span><svg
                     class="symbol symbol_arrow_right symbol_black">
                    <use xlink:href="#arrow_right"></use>
                </svg></a>
            <a class="hud_link_text"
               href="/flying-with-us/flights/departures"><span>View Departures</span><svg
                     class="symbol symbol_arrow_right symbol_black">
                    <use xlink:href="#arrow_right"></use>
                </svg></a>
        </footer>
    </div>
</div>