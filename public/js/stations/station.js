function fetchData(path)
{
    $.ajax({
        method: 'get',
        url: path,
        success: function (data) {
            $('#stationForm').attr("action","/update-station");
            let el = $('<input type="hidden" name="id" id="stationId" value="" />').val(data.id);
            $('#stationsLabel').html('ویرایش اطلاعات');
            $('#stationName').val(data.station_name);
            $('#stationId').remove();
            $('#stationName').before(el);
            $('#stations').modal('show');
        }
    });
}
