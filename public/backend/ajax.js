$(document).ready(function(){

    // adding Category starts
    $(document).on('click','.save',function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var name = $('.cat_name').val();
        var desc = $('.cat_desc').val();
        var status = $('.cat_status').val();

        

        $.ajax({
            url:"/addCategory",
            type:"POST",
            data:{
                'name':name,
                'desc':desc,
                'status':status
            },
            success:function(response){
                if(response.stat == "success"){
                    show();
                }
            }
        })
    });
    // Category adding ends


    show();


    // Category table show start
    function show(){
        $.ajax({
            url:"/showCategory",
            type:"GET",
            success:function(response){
                var tdata = "";
                var sl = 1;
                var statml = '';
                $.each(response.data, function(key,value){
                    if(value.status == 1){
                        statml = "<button class='cative btn btn-secondary btn-sm activeCat' id='"+value.id+"' value='"+value.status+"'>Active</button>";
                    }
                    else{
                        statml = "<button class='cative btn btn-warning btn-sm inactiveCat' id='"+value.id+"' value='"+value.status+"'>Inactive</button>";
                    }
                    tdata += "<tr>\
                    <td>"+sl+"</td>\
                    <td>"+value.name+"</td>\
                    <td>"+value.desc+"</td>\
                    <td>"+statml+"</td>\
                    <td><button value='"+value.id+"' class='editCat btn btn-info btn-sm'>Edit</button></td>\
                    <td><button class='deleteCat btn btn-danger btn-sm' value = '"+value.id+"'>Delete</a></td>\
                    </tr>"
                    sl++;
                });
                $('.tdata').html(tdata);
                // console.log(response);
            }
        })
    }
    // Category table show ends


    // Category delete starts
    $(document).on("click",".deleteCat",function(){
        var id = $(this).val();
        $.ajax({
            url:"/deleteCat/"+id,
            type:"GET",
            success:function(response){
                if(response.status == 200){
                    show();
                }
                else{
                    alert("not deleted! There's an error in the code!");
                }
            }
        })
    })
    // Category delete ends

    // Category edit form show start
    $(document).on("click",".editCat",function(){
        var id = $(this).val();
        $.ajax({
            url:"/editCat/"+id,
            type:"GET",
            success:function(response){
                if(response.status == 200){
                    $('.cat_name').val(response.data.name);
                    $('.cat_desc').val(response.data.desc);
                    $('.cat_status').val(response.data.status);
                    $('.save').hide();
                    $('.update').show();
                    $('.update').val(response.data.id);
                }
                else{
                    console.log('something went wrong in the response!')
                }
            }
        })
    })
    // Category update form show ends



    // catagory update starts
    $(document).on("click",".update",function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let id = $(this).val();
        let name = $('.cat_name').val();
        let desc = $('.cat_desc').val();
        let status = $('.cat_status').val();
        $.ajax({
            url:"/updateCat/"+id,
            type:"POST",
            data:{
                'name':name,
                'desc':desc,
                'status':status
            },
            success:function(response){
                if(response.status == 200){
                    show();
                    $('.update').hide();
                    $('.save').show();
                    $('.cat_name').val("");
                    $('.cat_desc').val("");
                    $('.cat_status').val(1);
                }
            }
        })
    })
    // category update ends



    // catagory status starts
    $(document).on('click','.cative',function(){
        let id = $(this).attr('id');
        $.ajax({
            url:"/cative/"+id,
            type:"GET",
            success:function(response){
                show();
            }
        })
    })
    // catagory status ends





})