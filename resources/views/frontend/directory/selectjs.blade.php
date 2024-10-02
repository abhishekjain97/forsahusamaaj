<!-- 
    This page include in 
        1. business_directory_list
        2. member_list 
-->

<script type="text/javascript">
    function FillValues(id, cat_id, sub_cat_id, country_id, state_id, city_id) {
        setTimeout(function() {
            myFunction(id, cat_id, sub_cat_id, country_id, state_id, city_id);
        }, 3000);
    }

    function myFunction(id, cat_id, sub_cat_id, country_id, state_id, city_id){
        if(cat_id != 0) {
            $("#category_id_"+id).val(cat_id);
            getSubCat(id, cat_id, sub_cat_id);
        }
        $("#country-dropdown_"+id).val(country_id);
        getState(id, country_id, state_id);
        getCity(id, state_id, city_id);
    }

    // search sub category
    function getSubCat(id, cat_id, sub_cat_id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#sub_category_id_"+id).html('');
        $.ajax({
            url: '{{ url("get-sub-category") }}',
            type: "POST",
            data: {
                category_id: cat_id

            },
            dataType: 'json',
            success: function(result) {
                $('#sub_category_id_'+id).html('<option disabled>Select Sub Category</option>');
                $.each(result.sub_category, function(key, value) {
                    // console.log(value);
                    var selected = '';
                    if(sub_cat_id != 0 && value.id == sub_cat_id) {
                        selected = 'selected';
                    }
                    var data = '<option value="' + value.id + '" '+selected+'>' + value.sub_category_name + '</option>';
                    $("#sub_category_id_"+id).append(data);
                });
                

            }
        });
    }

    function getCity(id, state_id, city_id) {
        // var state_id = document.getElementById("state-dropdown").value;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#city-dropdown_"+id).html('');
        $.ajax({
            url: '{{ url("get-city-by-state") }}',
            type: "POST",
            data: {
                state_id: state_id

            },
            dataType: 'json',
            success: function(result) {
                $('#city-dropdown_'+id).html('<option disabled>Select City</option>');
                $.each(result.cities, function(key, value) {
                    // console.log(value);
                    var selected = '';
                    if(city_id != 0 && value.id == city_id) {
                        selected = 'selected';
                    }
                    $("#city-dropdown_"+id).append('<option value="' + value.id + '" '+selected+'>' + value.city + '</option>');
                });
                

            }
        });
    }


    /* Get State*/
    function getState(id, country_id, state_id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#state-dropdown_"+id).html('');
        $.ajax({
            url: '{{ url("get-states-by-country") }}',
            type: "POST",
            data: {
                country_id: country_id

            },
            dataType: 'json',
            success: function(result) {
                $('#state-dropdown_'+id).html('<option disabled>Select State</option>');
                $.each(result.states, function(key, value) {
                    // console.log(value);
                    var selected = '';
                    if(state_id != 0 && value.id == state_id) {
                        selected = 'selected';
                    }
                    $("#state-dropdown_"+id).append('<option value="' + value.id + '" '+selected+'>' + value.name + '</option>');
                });
                

            }
        });
    }
</script>