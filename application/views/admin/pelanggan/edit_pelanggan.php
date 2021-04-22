<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Edit
			<small>Pelanggan</small>
		</h1>
		<ol class="breadcrumb">
			<li><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url(); ?>pelanggan">Pelanggan</a></li>
			<li class="active">Edit</li>

		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Form Data Edit Pelanggan</h3>
			</div>
			<div class="box-body">
				<!-- form start -->
				<?php echo form_open('pelanggan/update_pelanggan'); ?>
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
					value="<?= $this->security->get_csrf_hash(); ?>">
				<?php  
                
                foreach ($editdata as $data):
                ?>
				<input type="hidden" name="id" value="<?= $data->id_pelanggan; ?>"
						required />
				<div class="form-group">
					<label>Nama Perusahaan</label>
					<input type="text" class="form-control" name="nama_perusahaan" value="<?= $data->nama_usaha; ?>"
						required />
				</div>
				<div class="form-group">
					<label for="nama_pic">Nama PIC</label>
					<input type="text" class="form-control" name="nama_pic" value="<?= $data->pic; ?>" required />
				</div>
				<div class="form-group">
					<label for="nomor_pic">Nomor HP(WA)</label>
					<input type="number" class="form-control" name="nomor_pic" value="<?= $data->no_pic; ?>" required />
				</div>
				<div class="form-group">
					<label for="jabatan">Jabatan</label>
					<input type="text" class="form-control" name="jabatan" value="<?= $data->jabatan; ?>" />
				</div>
				<div class="form-group">
					<label for="kabupaten">Kabupaten</label>
					<select name="kabupaten" id="kabupaten" class="form-control" required>
						<option value="">Pilih</option>

						<?php
          foreach($kab as $tes){
              ?>
						<option value="<?= $tes->id ?>" <?php if ($tes->id == $data->kabupaten) {

echo "selected";
} ?>><?= $tes->nama ?></option>
						<?php }
          ?>
					</select>
				</div>
				<div class="form-group">
					<label for="kecamatan">kecamatan</label>
					<select name="kecamatan" class="form-control" id="kecamatan" required>
						<option value="<?= $data->kecamatan ?>"><?= $daerah->detail($data->kecamatan)->nama ?></option>
					</select>
				</div>

				<div class="form-group">
					<label for="deasa">Desa</label>
					<select name="desa" class="form-control" id="desa" required>
					<option value="<?= $data->desa ?>"><?= $daerah->detail($data->desa)->nama ?></option>
					</select>
				</div>
				<div class="form-group">
					<label for="alamat">Alamat</label>
					<input type="text" class="form-control" name="alamat" value="<?= $data->alamat ?>"
						required />
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" value="<?= $data->email ?>" />
				</div>
				<div class="form-group">
					<label for="status">Status/Keterangan</label>
					<input type="text" class="form-control" name="status" value="<?= $data->status ?>"
						required />
				</div>
				<div class="form-group">
					<label for="kategori">Kategori</label>
					<input type="text" class="form-control" name="kategori" value="<?= $data->kategori ?>" required />
				</div>
				<div class="form-group">
					<label for="jenis">Jenis</label>
					<input type="text" class="form-control" name="jenis" value="<?= $data->jenis ?>"" required />
				</div>
				<div class="form-group">
					<label for="bandwidth">Bandwidth</label>
					<input type="number" class="form-control" name="bandwidth" value="<?= $data->bandwidth ?>"
						required />
				</div>
                <?php if($this->session->userdata('_status')!=='Korlap'){ ?>
				<div class="form-group">
					<label for="korlap">Korlap</label>
					<select name="korlap" id="korlap" class="form-control" <?php if($this->session->userdata('_status')=='Korlap'){echo 'disabled';}else{echo 'required';} ?> >
						<option value="">Pilih</option>
						<?php
          foreach($korlap as $korlap1):?>
            <option value="<?= $korlap1->id_user ?>" <?php if ($korlap1->id_user == $data->id_korlap) {

echo "selected";
} ?>><?= $korlap1->nama?></option>
            <?php endforeach ?>
          ?>
					</select>
				</div>
<?php } ?>
				<?php endforeach ?>																																																																		
				<a href="<?php echo base_url(); ?>pelanggan" class="btn btn-warning"><i class="fa fa-arrow-left"></i>
					Batal</a>
				<button type="submit" name="UBAH" class="btn btn-success"><i class="fa fa-save"></i> Ubah</button>
				<?php echo form_close(); ?>

			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</section><!-- /.content -->
</div>

<script>
	$(document).ready(function () {
		$("#kabupaten").change(function () {
			var url = "<?php echo site_url('daerah/getkecamatan');?>/" + $(this).val();
			$('#kecamatan').load(url);
			return false;

		})
		$("#kecamatan").change(function () {
			var url = "<?php echo site_url('daerah/getdesa');?>/" + $(this).val();
			$('#desa').load(url);
			return false;

		})
	})

</script>
