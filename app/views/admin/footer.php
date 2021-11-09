</div>


<div class="app-wrapper-footer text-center">
    <div class="app-footer">
        <div class="app-footer__inner">
            <div class="app-footer-left">
              <?php 
                $user = $_SESSION['userData'];
                if ($user['role_id'] == 3) {
                  echo "<strong>".$user['phn']."</strong>";
                }else{
                  echo "<strong>"."&copy; 2021 Coded Info All Rights Reserved"."</strong>";
                }
              ?>
            </div>
            <div class="app-footer-right">
                <strong> Developed by </strong> &nbsp;
                <a target="_blank" href="http://sheraz.codedinfo.com/"> <b> Coded Info </b> </a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<script type="text/javascript" src="<?php echo MAIN_JS; ?>/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- For Data table -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.7/sweetalert2.all.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>

<script>
    $('#showtoast').on('click',function(){
    toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    }
    toastr["error"]("Please input your data", "Error!")
    })
</script>

<script>
    $('.delete').on('click',function(e){
    e.preventDefault();
    const href = $(this).attr('href')

    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.value) {
    window.location.href = href;
    }
    })
    })
</script>

<script>
    $('.falseMsg').on('click',function(e){
    e.preventDefault();
    const href = $(this).attr('href')

      Swal.fire("Sorry Sir, <br> We Can't Perform This Action 😢")
    })
</script>

<script>
    $(document).ready(function() {
      $('.select2').select2();
      });
</script>

<script>
  $(document).ready(function() {
    $('#myTable').DataTable( {
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
  } );  
</script>

</body>
</html>