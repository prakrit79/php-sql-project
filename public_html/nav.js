$(document).ready(function(){
    $('.menu ul li.drop-down > a').on('click',function(e){
        e.preventDefault();
        $(this.nextElementSibling).slideToggle(300);
    });//navigation


    $('#mydate').datetimepicker({
        format:'YYYY-MM-DD HH:mm'
    });//datetimepicker



    $('#checkallbtn').on('click',function(e){
        e.preventDefault();
        $('.checkbox').attr('checked','checked');
    })

    $('.myfancybox').fancybox();



    CKEDITOR.replace('txtdetails');//ckeditor



});
