</div>
<!-- End: Main -->

<!-- BEGIN: PAGE SCRIPTS -->
@section('js')
    <!-- jQuery -->
    <script src="{{asset('vendor/jquery/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('vendor/jquery/jquery_ui/jquery-ui.min.js')}}"></script>




    <!-- Theme Javascript -->
    <script src="{{asset('assets/js/utility/utility.js')}}"></script>

    <script src="{{asset('assets/js/main.js')}}"></script>



    <!--    feuille js perso-->
    <script src="{{asset('js/main.js')}}"></script>
@show
<script type="text/javascript">
    jQuery(document).ready(function() {

        "use strict";

        // Init Demo JS
       // Demo.init();


        // Init Theme Core
        Core.init();

        // dataTables
        if($('.dataTable').size()>0){
            $('.dataTable').dataTable({
                "languages": {
                    "lenghtMenu": "Afficher _MENU_ par pages",
                    "zeroRecords": "Aucun résultat trouvé",
                    "info": "Voir la page _PAGE_ sur _PAGE_",
                    "infoEmpty": "Aucun résultat disponible",
                    "infoFiltered": "(filtré sur _MAX_ résultats)"
                },
                "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>'
            });
        }

    });
</script>
<!-- END: PAGE SCRIPTS -->

</body>

</html>

