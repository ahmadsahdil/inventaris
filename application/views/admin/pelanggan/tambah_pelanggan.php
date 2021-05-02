<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Tambah
			<small>Pelanggan</small>
		</h1>
		<ol class="breadcrumb">
			<li><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url(); ?>pelanggan">Pelanggan</a></li>
			<li class="active">Tambah</li>

		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Form Data Tambah Pelanggan</h3>
			</div>
			<div class="box-body">
				<!-- form start -->
				<?php echo form_open('pelanggan/insert_pelanggan/'.$this->uri->segment(3)); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
				<div class="form-group">
					<label>Nama Perusahaan</label>
					<input type="text" class="form-control" name="nama_perusahaan"
						placeholder="Masukkan Nama Perusahaan" required />
				</div>
				<div class="form-group">
					<label for="nama_pic">Nama PIC</label>
					<input type="text" class="form-control" name="nama_pic" placeholder="Masukkan Nama PIC" required />
				</div>
				<div class="form-group">
					<label for="nomor_pic">Nomor HP(WA)</label>
					<input type="number" class="form-control" name="nomor_pic" placeholder="Masukkan Nomor PIC"
						required />
				</div>
				<div class="form-group">
					<label for="jabatan">Jabatan</label>
					<input type="text" class="form-control" name="jabatan" placeholder="Masukkan Jabatan" />
				</div>
				<div class="form-group">
					<label for="kabupaten">Kabupaten</label>
					<select name="kabupaten" id="kabupaten" class="form-control" required>
						<option value="">Pilih</option>

						<?php
          foreach($kab as $tes){ // Lakukan looping pada variabel siswa dari controller
            echo "<option value='".$tes->id."'>".$tes->nama."</option>";
          }
          ?>
					</select>
				</div>
				<div class="form-group">
					<label for="kecamatan">kecamatan</label>
					<select name="kecamatan" class="form-control " id="kecamatan" required>
						<option>Select Kecamatan</option>
					</select>
				</div>

				<div class="form-group">
					<label for="deasa">Desa</label>
					<select name="desa" class="form-control " id="desa" required>
						<option>Select Desa</option>
					</select>
				</div>
				<div class="form-group">
					<label for="alamat">Alamat</label>
					<input type="text" class="form-control" name="alamat" placeholder="Masukkan Detail Alamat"
						required />
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" placeholder="Masukkan Email" />
				</div>
				<div class="form-group">
					<label for="status">Status/Keterangan</label>
					<input type="text" class="form-control" name="status" placeholder="Masukkan status/keterangan"
						required />
				</div>
				<div class="form-group">
					<label for="kategori">Kategori</label>
					<input type="text" class="form-control" name="kategori" placeholder="Masukkan Kategori" required />
				</div>
				<div class="form-group">
					<label for="jenis">Jenis</label>
					<input type="text" class="form-control" name="jenis" placeholder="Masukkan Jenis" required />
				</div>
				<div class="form-group">
					<label for="bandwidth">Bandwidth</label>
					<input type="number" class="form-control" name="bandwidth" placeholder="Masukkan Bandwidth"
						required />
				</div>
				<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
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
