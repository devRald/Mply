<main class="">
    <div class="container-fluid">
        <?php foreach($company_app as $a) { ?>
        <div id="company" class="col-md-12">
            <div class="media">
                    <a class="media-left waves-light">
                        <img class="img-circle" style="max-width: 100px" src="<?= get_image_url($a['applicant_image']); ?>" alt="Generic placeholder image">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?= $a['applicant_fname'] .' '. $a['applicant_lname'] ; ?></h4>
                        <p><?= $a['applicant_contactno']; ?><br><?= $a['applicant_address']; ?></p>
                        <p>Applying for: <?= $a['job_title']; ?></p>
                    </div>
                    <?php if($a['is_invited'] == 0){ ?><a href="<?= site_url('/company/invite/'.$a['applicant_ID'].'/'.$company_info->company_ID.'/'.$a['job_ID']); ?>" class="btn btn-primary pull-right">Invite for Interview</a> <?php } else { ?>
                        <a href="<?= site_url('/company/uninvite/'.$a['applicant_ID'].'/'.$company_info->company_ID.'/'.$a['job_ID']); ?>" class="btn btn-danger pull-right">Uninvite for Interview</a>
                    <?php } ?>
                </div>
                <hr>
            </div>
        <?php } ?>
        <div class="bd-example">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title text-xs-center" id="exampleModalLabel">Applicant Job Title</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
							    <div class="col-sm-3">
							       	<img class="img-circle" src="http://mdbootstrap.com/wp-content/uploads/2015/10/team-avatar-1.jpg" alt="Generic placeholder image">
							    </div>
							    
							    <div class="col-sm-9">
							      <div class="row">
							      	<div class="col-sm-12">
							      		<p>Name</p>
							      		<p>Contact No</p>
							      		<p>Email Address</p>
							      	</div>
							      </div>
							    </div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<strong>Job Qualification</strong>
									<hr>
								</div>
							</div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <strong>Skills</strong>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="comtoapplicant.html" type="button" class="btn btn-primary">View More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>