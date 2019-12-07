$('#husbandStateId').change(function () {
    let state_id = $(this).val();
    $.ajax({
        type: 'get',
        url: '/getCities/'+state_id,
        success: function (data) {
            $('#husbandCityId').empty();
            $.each(data,function(key,value){
                $("#husbandCityId").append('<option value="'+key+'">'+value+'</option>');
            });
        }
    });
});
$('#wifeStateId').change(function () {
    let state_id = $(this).val();
    $.ajax({
        type: 'get',
        url: '/getCities/'+state_id,
        success: function (data) {
            $('#wifeCityId').empty();
            $.each(data,function(key,value){
                $("#wifeCityId").append('<option value="'+key+'">'+value+'</option>');
            });
        }
    });
});
