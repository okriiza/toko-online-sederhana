<footer class="section-footer mt-5 border-top text-white">
    <div class="container pt-5 pb-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <h5 class="font-weight-bold">LOKASI</h5>
                        <p class="font-weight-light text-justify"><small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi fugiat consequatur, sapiente quidem laborum a, perferendis maiores tempore asperiores ratione unde voluptates ut reiciendis sint vel nesciunt fuga pariatur enim?</small></p>
                    </div>
                    <div class="col-12 col-lg-3">
                        <h5 class="font-weight-bold">ACCOUNT</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Refund</a></li>
                            <li><a href="#">Security</a></li>
                            <li><a href="#">Rewards</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-3">
                        <h5 class="font-weight-bold">COMPANY</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Career</a></li>
                            <li><a href="#">Help Center</a></li>
                            <li><a href="#">Media</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-3">
                        <h5 class="font-weight-bold">GET CONNECTED</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Bandung</a></li>
                            <li><a href="#">Indonesia</a></li>
                            <li><a href="#">0821 - 2222 - 8888</a></li>
                            <li><a href="#">support@pakaianku.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row border-top justify-content-center align-items-center pt-4">
            <div class="col-auto text-white font-weight-light mb-4">
            2020 Copyright Pakaianku • All rights reserved 
            </div>
        </div>
    </div>
</footer>


    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/fontawesome/js/all.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/plugin/xzoom/xzoom.min.js"></script>
    <script src="admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="admin/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="admin/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
    $(function() {
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        })
    })
    </script>
    <script>
        $(document).ready(function () {
            $(".xzoom, .xzoom-gallery").xzoom({
                zoomWidth: 500,
                title: false,
                tint: "#333",
                Xoffset: 15
            });
        });
    </script>
</body>
</html>