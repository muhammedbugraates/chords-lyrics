<div class="container">
    <div class="text-center mb-5">
        <h3><i class="fa fa-home fa-3x"></i></h3>
        <h2 class="text-center"><?= $title; ?></h2>
    </div>

    <div class="row">
        <div class="col-sm-4 offset-2">
            <div class="card border-primary mb-3" style="max-width: 20rem;">
                <div class="card-header text-center">
                    <i class="fa fa-folder fa-2x"></i>
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">Repertories</h4>
                    <p class="card-text">You can find all repertoris.</p>
                    <form action="<?php echo base_url('repertories'); ?>">
                        <button type="submit" class="btn btn-primary btn-block">See all repertories</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card border-primary mb-3" style="max-width: 20rem;">
                <div class="card-header text-center">
                    <i class="fa fa-music fa-2x"></i>
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">Songs</h4>
                    <p class="card-text">You can find all songs.</p>
                    <form action="<?php echo base_url('songs'); ?>">
                        <button type="submit" class="btn btn-primary btn-block">See all songs</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 offset-2">
            <div class="card border-primary mb-3" style="max-width: 20rem;">
                <div class="card-header text-center">
                    <i class="fa fa-microphone-alt fa-2x"></i>
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">Artists</h4>
                    <p class="card-text">You can find all artists.</p>
                    <form action="<?php echo base_url('artists'); ?>">
                        <button type="submit" class="btn btn-primary btn-block">See all artists</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card border-primary mb-3" style="max-width: 20rem;">
                <div class="card-header text-center">
                    <i class="fa fa-chart-pie fa-2x"></i>
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">Genres</h4>
                    <p class="card-text">You can see all genres.</p>
                    <form action="<?php echo base_url('genres'); ?>">
                        <button type="submit" class="btn btn-primary btn-block">See all genres</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>