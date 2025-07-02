function tocontroller(controller, active, sub_uom, dopdown) {
	if (active != '') {
		$(".sub_reset").removeClass("active"); // hapus class aktif pada sub navbar
		$(".collapse").removeClass("show"); // hapus dropdown
		$('[aria-expanded]').attr("aria-expanded", "false"); // reset semua jadi false
		$("#" + active).attr("aria-expanded", "true"); // tentukan navbar aktive
	}
	if (sub_uom != '') {
		$("#" + sub_uom).addClass("active"); // tambah class active pada sub navbar
	}
	if (dopdown != '') {
		$("#" + dopdown).addClass("show"); // tambah class show pada dropdown
	}
	showLoader();
	loadform(controller);
	
}
function loadform(controller) {
	var base = BASE_URL;
	var url = base + controller;
	showLoader();
	$("#contentdata").load(url, function (response, status, xhr) {
		hideLoader();
		if (status === "error") {
			console.error("Terjadi kesalahan:", xhr.status, xhr.statusText);
			$("#contentdata").html(`<div class="alert alert-danger">Gagal memuat konten.</div>`);
			return;
		}
		// Cek apakah response JSON dengan session expired
		try {
			let json = JSON.parse(response);
			if (json.session_expired) {
				swet_gagal(json.message);
				setTimeout(function () {
					window.location.href = json.redirect;
				}, 2000); // 2000 ms = 2 detik delay
				return;
			}
		} catch (e) {
			// Bukan JSON? lanjut seperti biasa
		}
	});
}

function showLoader() {
	$("#preloader").fadeIn();	
}

function hideLoader() {
	$("#preloader").fadeOut();

}
  

function swet_sukses(pesan) {
	Swal.fire({
		icon: "success",
		title: pesan,
		showConfirmButton: false,
		timer: 2000,
	});
}
function swet_gagal(pesan) {
	Swal.fire({
		icon: "info",
		title: pesan,
		showConfirmButton: false,
		timer: 2000,
	});
}

function hapus(uuid, url_hapus, load_grid) {
	Swal.fire({
		icon: "question",
		title: "Apakah Anda Yakin!",
		text: "Data Ini Akan Di Hapus Secara Permanen",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		cancelButtonText: "Batal",
		confirmButtonText: "Ya !",
		reverseButtons: true,
	}).then((result) => {
		if (result.value) {
			$.ajax({
				type: "POST",
				url: url_hapus,
				method: "POST",
				dataType: "JSON",
				data: {
					uuid: uuid,
					token: $("#token").val(),
				},
				success: function (data) {
					if (data.hasil == "true") {
						hideLoader();
						swet_sukses(data.pesan);						
						loadform(load_grid);
					} else {
						Swal.fire({
							icon: "info",
							title: "Information",
							text: data.pesan,
						});
					}
				},
			});
		} else if (result.dismiss === "cancel") {
			Swal.fire({
				icon: "info",
				title: "Information",
				html: "Batal Dihapus",
			});
		}
	});
}

