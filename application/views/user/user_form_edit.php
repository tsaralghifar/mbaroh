<section class="content-header">
      <h1>
        User
        <small>Pengguna</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
        <li class="active">User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit User</h3>
            <div class="pull-right">
                <a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>Back
                </a>
            </div>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="post">
                        <div class="form-group <?=form_error('fullname') ? 'has-error' : null?>">
                            <label>Nama *</label>
                            <input type="hidden" name="user_id" value="<?=$row->user_id?>">
                            <input type="text" name="fullname" value="<?=$this->input->post('fullname') ?? $row->nama?>" class="form-control">
                            <?=form_error('fullname')?>
                        </div>
                        <div class="form-group <?=form_error('username') ? 'has-error' : null?>">
                            <label>Username *</label>
                            <input type="text" name="username" value="<?=$this->input->post('username') ?? $row->username?>" class="form-control">
                            <?=form_error('username')?>
                        </div>
                        <div class="form-group <?=form_error('password') ? 'has-error' : null?>">
                            <label>Password</label><small>(Biarkan kosong jika tidak diganti)</small>
                            <input type="password" name="password" value="<?=$this->input->post('password')?>" class="form-control">
                            <?=form_error('password')?>
                        </div>
                        <div class="form-group <?=form_error('passwordconf') ? 'has-error' : null?>">
                            <label>Password Confirmation</label>
                            <input type="password" name="passwordconf" <?=$this->input->post('passwordconf')?> class="form-control">
                            <?=form_error('passwordconf')?>
                        </div>
                        <div class="form-group">
                            <label>Alamat *</label>
                            <textarea name="alamat" class="form-control"><?=$this->input->post('alamat') ?? $row->alamat?></textarea>
                        </div>
                        <div class="form-group <?=form_error('level') ? 'has-error' : null?>">
                            <label>Level</label>
                            <select name="level" class="form-control">
                                <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level?>
                                <option value="1">-Admin-</option>
                                <option value="2"<?=$level == 2 ? 'selected' : null?>>-Pengguna-</option>
                            </select>
                            <?=form_error('level')?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i>Save
                            </button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

      <!-- Default box -->
      <!-- <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-th"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Items</span>
              <span class="info-box-number">90</span>
            </div>
          </div>
        </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-truck"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Suppliers</span>
              <span class="info-box-number">4</span>
            </div>
          </div>
        </div>

        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Costumer</span>
              <span class="info-box-number">60</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">User</span>
              <span class="info-box-number">4</span>
            </div>
          </div>
        </div>
      </div>
        
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div> -->
      <!-- /.box -->

    </section>