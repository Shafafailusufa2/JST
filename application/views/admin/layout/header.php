<header>
    <!-- Tampilan Mobile ====================================================================================================-->

    <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if (match)
                var color = match[1];
            if (color) {
                $('body').removeClass(function(index, css) {
                    return (css.match(/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});

        });

        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>


    <!-- Tampilan Header ======================================================================================================-->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand"><img src='<?php base_url() ?>assets/images/kareem.jpg' height='30' width='40'></span>
            <span id="spanSMK" class="navbar-brand"> Aplikasi Prediksi Jumlah Calon Santri Yayasan Kareem Bil Qur'an Depok</span>
        </div>

        <div class="navbar-collapse collapse" style="height: 1px;">
            <ul id="main-menu" class="nav navbar-nav navbar-right">
                <li class="dropdown hidden-xs">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> <?php
                        if ($this->session->userdata('nama')) {
                            echo "<label>" . $this->session->userdata('nama') . " </label>";
                        }
                        ?>
                        <i class="fa fa-caret-down"></i>
                    </a>

                    <ul class="dropdown-menu" >
                        <li class="dropdown-header">Admin Panel</li>
                        <li class="divider"></li>
                        <li><a id="pointer" tabindex="-1" onclick="logout_modal();" >Keluar</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</div>
</header>



