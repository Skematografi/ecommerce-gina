<style>
    body {font-family: Arial, Helvetica, sans-serif;}

    /* The Modal (background) */
    .modal {
    display: block; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
    height: 450px;
    }

    /* The Close Button */
    .close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    }

    .close:hover,
    .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
    }

    .voucher{
        color: #ffd000;
        font-size:150px;
        padding-top:none;
        font-weight: bold;
    }

    .code-voucher {
        margin:30px;
        padding:10px;
        width:95%;
        background-color: #000000;
        color: #fefefe;
        font-size: 17px;
    }

    .modal-body{
     background-color: #ececec;
     text-align: center;
     }
</style>
<!-- The Modal -->

<div id="modal_umum" class="modal">

  <!-- Modal content -->
  <div class="modal-content modal-body">
    <span class="close" onclick="close_popup()">&times;</span>
    <div class="text-left">
    <img src="<?php echo base_url();?>assets/images/logo/logo.png" alt="Colonizer.co Llogo" style="opacity: .8; width:120px;">
    </div>
    <h1 style="margin:15px;">DAPATKAN VOUCHER</h1>
    <hr style="border:1px solid #000000; margin:0; opacity: .3;">
    <h1 class="voucher">5%</h1> 
    <P>Tanpa Batas Maksimal</P> 
    <P>Dengan Menjadi Member Kami</P> 
    <hr style="border:1px solid #000000; margin-bottom:20px; opacity: .3;">
    <a href="<?php echo base_url();?>auth/register" class="code-voucher">
        DAFTAR MEMBER SEKARANG
    </a>
  </div>

</div>

<script>
    $(function(){

        let modal_umum = $("#modal_umum");
        modal_umum.css('display', 'block');

    });

    function close_popup(){
        $("#modal_umum").css('display', 'none');
    }
</script>