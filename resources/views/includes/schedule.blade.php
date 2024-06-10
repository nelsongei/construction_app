<button
    class="btn btn-primary btn-timepicker btn-block dropdown-toggle text-truncate"
    type="button" id="orderTimePicker" data-bs-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    <i class="far fa-clock"></i>&nbsp;&nbsp;
    <b>
        ASAP </b>
</button>

<div class="dropdown-menu w-100" aria-labelledby="orderTimePicker">
    <button type="button" class="dropdown-item py-2 active"
            data-timepicker-option="asap"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;ASAP
    </button>
    <button type="button" class="dropdown-item py-2"
            data-timepicker-option="later"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Schedule
        Order
    </button>

    <form class="dropdown-content px-4 py-3 hide" role="form"
          data-request="localBox::onSetOrderTime">
        <input type="hidden" data-timepicker-control="type" value="asap"
               autocomplete="off">
        <div class="row g-0">
            <div class="col pe-1">
                <div class="form-group">
                    <select class="form-select" data-timepicker-control="date"
                            data-timepicker-label="Select a date"
                            data-timepicker-selected="2024-01-10">
                        <option value="2024-01-10" selected="selected">Wed 10
                        </option>
                    </select>
                </div>
            </div>
            <div class="col pl-1">
                <div class="form-group">
                    <select class="form-select" data-timepicker-control="time"
                            data-timepicker-label="Select a time"
                            data-timepicker-selected="08:24">
                        <option value="">Select a time</option>
                        <option value="08:30">08:30 am</option>
                        <option value="08:45">08:45 am</option>
                        <option value="09:00">09:00 am</option>
                        <option value="09:15">09:15 am</option>
                        <option value="09:30">09:30 am</option>
                        <option value="09:45">09:45 am</option>
                        <option value="10:00">10:00 am</option>
                        <option value="10:15">10:15 am</option>
                        <option value="10:30">10:30 am</option>
                        <option value="10:45">10:45 am</option>
                        <option value="11:00">11:00 am</option>
                        <option value="11:15">11:15 am</option>
                        <option value="11:30">11:30 am</option>
                        <option value="11:45">11:45 am</option>
                        <option value="12:00">12:00 pm</option>
                        <option value="12:15">12:15 pm</option>
                        <option value="12:30">12:30 pm</option>
                        <option value="12:45">12:45 pm</option>
                        <option value="13:00">01:00 pm</option>
                        <option value="13:15">01:15 pm</option>
                        <option value="13:30">01:30 pm</option>
                        <option value="13:45">01:45 pm</option>
                        <option value="14:00">02:00 pm</option>
                        <option value="14:15">02:15 pm</option>
                        <option value="14:30">02:30 pm</option>
                        <option value="14:45">02:45 pm</option>
                        <option value="15:00">03:00 pm</option>
                        <option value="15:15">03:15 pm</option>
                        <option value="15:30">03:30 pm</option>
                        <option value="15:45">03:45 pm</option>
                        <option value="16:00">04:00 pm</option>
                        <option value="16:15">04:15 pm</option>
                        <option value="16:30">04:30 pm</option>
                        <option value="16:45">04:45 pm</option>
                        <option value="17:00">05:00 pm</option>
                        <option value="17:15">05:15 pm</option>
                        <option value="17:30">05:30 pm</option>
                        <option value="17:45">05:45 pm</option>
                        <option value="18:00">06:00 pm</option>
                        <option value="18:15">06:15 pm</option>
                        <option value="18:30">06:30 pm</option>
                        <option value="18:45">06:45 pm</option>
                        <option value="19:00">07:00 pm</option>
                        <option value="19:15">07:15 pm</option>
                        <option value="19:30">07:30 pm</option>
                        <option value="19:45">07:45 pm</option>
                        <option value="20:00">08:00 pm</option>
                        <option value="20:15">08:15 pm</option>
                        <option value="20:30">08:30 pm</option>
                        <option value="20:45">08:45 pm</option>
                        <option value="21:00">09:00 pm</option>
                        <option value="21:15">09:15 pm</option>
                        <option value="21:30">09:30 pm</option>
                        <option value="21:45">09:45 pm</option>
                        <option value="22:00">10:00 pm</option>
                        <option value="22:15">10:15 pm</option>
                        <option value="22:30">10:30 pm</option>
                        <option value="22:45">10:45 pm</option>
                        <option value="23:00">11:00 pm</option>
                        <option value="23:15">11:15 pm</option>
                        <option value="23:30">11:30 pm</option>
                        <option value="23:45">11:45 pm</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="button"
                class="btn btn-block btn-outline-primary text-nowrap"
                data-timepicker-submit="" data-attach-loading="">
            Set Delivery Time
        </button>
    </form>
</div>
