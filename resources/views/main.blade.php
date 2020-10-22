<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fake Data Generator * for Educational Purposes">
    <meta name="keywords" content="Data,Generator,Fake,JSON,CSV,Download,Excel,AJAX">
    <meta name="author" content="Tilung">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Fake Generator</title>
  
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="icon" href="../image/logo.png">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://unpkg.com/tabulator-tables@4.8.2/dist/css/tabulator.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables@4.8.2/dist/js/tabulator.min.js"></script>
    <script type="text/javascript" src="https://oss.sheetjs.com/sheetjs/xlsx.full.min.js"></script>
    <script src="https://kit.fontawesome.com/5527dfae6b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>


<body>

<nav class="navbar navbar-expand-lg navbar-light bg-dark  mb-3">
  <a class="navbar-brand text-light font-weight-bold"  href="/">
  Data Fake Generator</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-outline-light my-2 my-sm-0" data-toggle="collapse" data-target="#collapse_id" type="button"><i class="fas fa-arrow-circle-down"></i></button>
    </form>
  </div>
</nav>

<div class="row collapse m-3 " id="collapse_id">
    <div class="col-md-12 ">
    <div class="card card-body">
    @include('note')
       
  </div>
    
    </div>

  
</div>
<div class ="container-fluid">

    <div class="row">
    <div class="col-md-12 ">
        <form id="form" method="Post"autocomplete="off" action="/test">
        <div class="row">
            <div class="col-md-6 mb-2">
    
            {{csrf_field()}}
            <input type="number" class="form-control mb-2" name="input_count"placeholder="Input Amount Data" required min="1" max="80000">

            <input type="name" class="form-control mb-2" name="input_table" placeholder="Input Table Name" required> 
        
            <select class="js-example-basic-single mb-2 " name="select_country" style="width:50%">
            <option value="id_ID">Indonesia</option>
            
            <option value="en_EN">England</option>

            <option value="it_IT">Italy</option>
            </select>
            
            <div class ="row  mt-2 ">
                <div class="col-md-12">
                    <button  class="btn btn-primary" >Submit 
                    </button>
                </div>
            </div>
            </div>
            <div class="col-md-6">

            <div class="row form-group" id="dynamic_form">
                <div class="col-md-5 mb-2">
                    <input type="name" class="form-control mb-2" name="input_row[]"placeholder="Input Row Table Name" required>
                </div>
                <div class="col-md-5 mb-2" >
                    <div class="input-group">
                        <select name="select_type[]" class="custom-select" id="select_input">
                        
                            <option value="name">Person Name</option>
                            <option value="quantity">Quantity</option>
                            <option value="salary">Salary</option>
                            <option value="dob">DOB </option>
                            <option value="address">Address</option>
                            <option value="gender">Gender</option>
                            <option value="increment">Increment</option>
                         </select>
                        <div class="input-group-append">
                            <label class="input-group-text" for="select_input">Type</label>
                        </div>
                    </div>
                 </div>  
                 <div class="col-sm-2 mb-2 ">
                 <button  type="button" class="btn btn-success text center" id="add_btn" >
                 <i class="fas fa-plus"></i>
                 </button>
                 </div>
            </div>
        </div>
         
        </div>
        </div>
    </div>
    
    </form>
    <div class ="row">

        <div class="col-md-12">
       <img id="loading" src="../image/810.gif" alt="">

        <div id="example-table"></div>
        
       
        </div>

        
    </div>

    <div class="row mt-2 mb-3">
    <div class="col-md-12">
    <div id="button_div" >
            <button id="csv_btn" class="btn btn-warning text-light"><i class="fas fa-file-csv"></i> Download CSV</button>
            <button id="excel_btn" class="btn btn-success"><i class="fas fa-file-excel"></i> Download Excel</button>
            <button id="json_btn" class="btn btn-dark"><i class="far fa-file"></i> Download JSON</button>
        </div>
    </div>
    </div>
</div>


</body>

<script>

$( document ).ready(function() {

    function download(title, file_name){
        table.download(title, file_name);
    }

    function downloadExcel(title,file_name,sheet_name){
        table.download(title, file_name, {sheetName:sheet_name});
    }


    function formatState (state) {
        if (!state.id) {
            return state.text;
        }
    
        let $state = $(
            '<span><img src="../image/'+state.element.value.toLowerCase()+'.png" class="img-flag" /> ' + state.text + '</span>'
        );
            return $state;
    };

    let table = new Tabulator("#example-table", {            
        layout:"fitColumns",      
        tooltips:true,            
        addRowPos:"top",          
        history:true,            
        pagination:"local",      
        paginationSize:30,         
        movableColumns:true,      
        resizableRows:true,      
        initialSort:[            
            {column:"name", dir:"asc"},
        ],
        autoColumns : true
        }); 

                   
    let input_table = $('input[name="input_table"]');
    let div_hide = $('#button_div');
    let table_hide = $('#example-table');
   

    table_hide.hide();
    div_hide.hide();
   

    document.getElementById("csv_btn").addEventListener("click", function(){
        
        download("csv",input_table.val()+".csv");
    });


    document.getElementById("json_btn").addEventListener("click", function(){

        download("json",input_table.val()+".json")
    });


    document.getElementById("excel_btn").addEventListener("click", function(){

        downloadExcel("xlsx",input_table.val()+".xlsx",input_table.val());

    }); 

    $('.js-example-basic-single').select2({
        templateResult: formatState
    });

    

    let i = 1;
    $('#add_btn').click(function(event){
        if(i <=9 ){ 
        i++;
        let button = '<div class="col-md-5 mb-2 input_row'+i+'" >'+
                    '<input type="name" class="form-control mb-2"  name="input_row[]"placeholder="Input Row Table Name" required>'+
                    '</div>'+
                    '<div class="col-md-5 mb-2 input_row'+i+'" >'+
                    '<div class="input-group">'+
                        '<select name="select_type[]" class="custom-select" id="select_input">'+
                            '<option value="name">Person Name</option>'+
                            '<option value="quantity">Quantity</option>'+
                            '<option value="salary">Salary</option>'+
                            '<option value="dob">DOB </option>'+
                            '<option value="address">Address</option>'+
                            '<option value="gender">Gender</option>'+
                            '<option value="increment">Increment</option>'+
                         '</select>'+
                        '<div class="input-group-append">'+
                            '<label class="input-group-text" for="select_input">Type</label>'+
                        '</div>'+
                    '</div>'+
                 '</div>'+  
                 '<div class="col-md-2 mb-2 input_row'+i+' ">'+
                 '<button type="button" class="btn btn-danger btn_delete text center" id="'+i+'" >'+
                 '<i class="fas fa-minus"></i>'+
                 '</button>'+
                 '</div>';

        $('#dynamic_form').append(button);
        }
      else{
        alert('Max Row : 10');
      }
            
        
    });

    $(document).on('click','.btn_delete',function(){
        let button_id = $(this).attr("id");
        $('.input_row'+button_id+'').remove();
        i--;
        message_danger.hide();
    });

    $('#loading').hide();

    $("#form").submit(function(event){
        // Prevent Form Submit
        event.preventDefault();

    
        let $form = $(this);

        let $inputs = $form.find("input, select, button");

        // Serialize the data in the form
        let serializedData = $form.serialize();
    
        $.ajax({
            url: '/test',
            type: 'post',
            data: serializedData,
            dataType: 'json',
            beforeSend: function() {  
                    $('#loading').show();
                    table_hide.hide();
            },
            success: function (data) {
                $('#loading').hide();
                div_hide.show();
                table_hide.show();
            
                
                let input_row = $('input[name="input_row[]"]');

                let array = [];

                for(var i =0;i < data["data"][0][input_row.eq(0).val()].length ;i++){
                    let json_data = {};

                    for(var a =0;a < data["data"].length;a++){
                        json_data[input_row.eq(a).val()] = data["data"][a][input_row.eq(a).val()][i];
                    }
                    
                    array.push(json_data);

                }
     
                table.setData(array);
                
             }, 
         }); 

    }); 
});




</script>
</html>