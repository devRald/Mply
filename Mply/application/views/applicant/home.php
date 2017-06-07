<br><br><br><br>
<main class="">
    <div class="container-fluid">
    <?php foreach ($user_company as $uc) { ?>
        <div data-com="<?= $uc['company_ID']; ?>" data-name="<?= $uc['company_name']; ?>" data-email="<?= $uc['company_email']; ?>" data-address="<?= $uc['company_add']; ?>" class="col-md-12 company">
            <!--First review-->
            <div class="media">
                <a class="media-left waves-light">
                    <img class="img-circle" src="http://mdbootstrap.com/wp-content/uploads/2015/10/team-avatar-1.jpg" alt="Generic placeholder image">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?= $uc['company_name']; ?></h4>
                    <ul class="rating inline-ul">
                        <li><i class="fa fa-star amber-text"></i></li>
                        <li><i class="fa fa-star amber-text"></i></li>
                        <li><i class="fa fa-star amber-text"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi cupiditate temporibus iure soluta. Quasi mollitia maxime nemo quam accusamus possimus, voluptatum expedita assumenda. Earum sit id ullam eum vel delectus!</p>
                </div>
            </div>
            <hr>
        </div>
    <?php } ?>
        <?php $this->load->view('applicant/company_modal'); ?>
    </div>
</main>