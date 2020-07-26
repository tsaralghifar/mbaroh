<section class="content-header">
      <h1>
        Kritik & Saran
        <small>Feedback</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
        <li class="active">Feedback</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Kritik & Saran</h3>
      <div class="pull-right">
        <a href="<?= site_url('feedback/print') ?>" class="btn btn-success btn-flat">
          <i class="fa fa-print"></i>Print
        </a>
      </div>
    </div>

    <form action="" method="get">
    <select name="filter" id="filter">
      <option value="0" <?= $this->input->get('filter') == 0 ? 'selected' : '' ?>>Bintang 1</option>
      <option value="1" <?= $this->input->get('filter') == 1 ? 'selected' : '' ?>>Bintang 2</option>
      <option value="2" <?= $this->input->get('filter') == 2 ? 'selected' : '' ?>>Bintang 3</option>
      <option value="3" <?= $this->input->get('filter') == 3 ? 'selected' : '' ?>>Bintang 4</option>
      <option value="4" <?= $this->input->get('filter') == 4 ? 'selected' : '' ?>>Bintang 5</option>
    </select>
    <button type="submit">Subhan</button>
    </form>
    <a href="<?= base_url('feedback') ?>" class="btn btn-primary">Reset</a>

    <div class="box box-widget">
    <?php foreach($row as $key => $data) { ?>
    <div class="box-header with-border">
      <div class="media">
        <div class="media-body">
          <h5 class="mt-0 mb-1 text-center"><strong><?= $data->nama_plgn ?></strong></h5>
          <p class="text-center"><em><?= $data->kritik_saran ?></em></p>
        </div>
        <div class="text-center">
            <i class="fa fa-star" data-index="0" <?= $data->rateIndex >= 0 ? 'style="color: yellow;"' : null; ?>></i>
            <i class="fa fa-star" data-index="1" <?= $data->rateIndex >= 1 ? 'style="color: yellow;"' : null; ?>></i>
            <i class="fa fa-star" data-index="2" <?= $data->rateIndex >= 2 ? 'style="color: yellow;"' : null; ?>></i>
            <i class="fa fa-star" data-index="3" <?= $data->rateIndex >= 3 ? 'style="color: yellow;"' : null; ?>></i>
            <i class="fa fa-star" data-index="4" <?= $data->rateIndex == 4 ? 'style="color: yellow;"' : null; ?>></i>
        </div>
      </div>
    </div>
    <?php } ?>
    </div>

    </section>