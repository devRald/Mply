<main class="">
    <div class="container-fluid">
        <div class="row">
        	<div class="col-md-4 text-xs-center">
        		<img class="img-rounded" style="height:300px;" src="<?= get_image_url('astronaut.png'); ?>" alt="Generic placeholder image">
        		<br>
        		<strong class=""><?= $company[0]['company_name']; ?></strong>
        		<p><?= $company[0]['company_email']; ?></p>
        		<p><?= $company[0]['company_add']; ?></p>
        	</div>
        	<div class="col-md-8 text-xs-center">
        		<div class="lead">Compatible Jobs</div>
				<ul class="list-group text-xs-left">
					<?php foreach ($skills as $s) { ?>
						<li class="list-group-item" style="padding-bottom: 30px;padding-top: 5px;">
					        <span class="pull-xs-right"><a href="<?= site_url('/applicant/apply/').$company[0]['company_ID'].'/'.$s['job_ID'] .'/'. $company[0]['company_ID']; ?>" class="btn btn-primary">Apply</a></span> <?= $s['job_title']; ?> 
					    </li>	
					<?php } ?>
				</ul>
        	</div>
        </div>
        
    </div>
</main>