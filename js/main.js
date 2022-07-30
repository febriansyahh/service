$(document).ready(function () {
    $('#example').DataTable();
});

// $("#adm_plp").DataTable({
//     columns: [
//       { width: "5%" }, // No
//       { width: "15%" }, // Petugas
//       { width: "15%" }, // Penugasan
//       { width: "15%" }, // Jadwal
//       { width: "10%" }, // Tanggal
//       { width: "25%" }, // Laporan
//       { width: "10%" }, // Dikirim
//       { width: "15%" }, // Opsi
//     ],
//   });


// function checkFileExist(urlToFile) {
//     var xhr = new XMLHttpRequest();
//     xhr.open('HEAD', urlToFile, false);
//     xhr.send();
     
//     if (xhr.status == "404") {
//         return false;
//     } else {
//         return true;
//     }
// }

function editableLimit(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  console.log(exp[1]);
  $("#editId").val(exp[0]);
  $("#editLimit").val(exp[1]);
}

function editableBrand(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  console.log(exp[1]);
  $("#editId").val(exp[0]);
  $("#editNmBrand").val(exp[1]);
}

function editableMotor(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  console.log(exp[1]);
  $("#editId").val(exp[0]);
  $("#editNm").val(exp[1]);
  $("#editidBrand").val(exp[2]);
  $("#editBrand").val(exp[3]);
}

function editablePart(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  console.log(exp[1]);
  $("#editId").val(exp[0]);
  $("#editNm").val(exp[1]);
  $("#editidBrand").val(exp[2]);
  $("#editHarga").val(exp[3]);
  $("#editStatus").val(exp[4]);
}

function editableMember(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  console.log(exp[1]);
  $("#editId").val(exp[0]);
  $("#editNm").val(exp[1]);
  $("#editGender").val(exp[2]);
  $("#editAlamat").val(exp[3]);
  $("#editNohp").val(exp[4]);
  $("#editRegis").val(exp[5]);
}

function editablekaryawan(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  console.log(exp[1]);
  $("#editId").val(exp[0]);
  $("#editNm").val(exp[1]);
  $("#editGender").val(exp[2]);
  $("#editAlamat").val(exp[3]);
  $("#editIdJob").val(exp[4]);
  $("#editRegis").val(exp[5]);
  $("#editStatus").val(exp[6]);
}

function editableJobdesk(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  console.log(exp[1]);
  $("#editId").val(exp[0]);
  $("#editNm").val(exp[1]);
  $("#editKet").val(exp[2]);
}


function editableBooking(param) {
    let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  console.log(exp[4]);
  $("#editId").val(exp[0]);
  $("#editIdMember").val(exp[1]);
  $("#editNoantri").val(exp[2]);
  $("#editTanggal").val(exp[3]);
  $("#editKeluhanBook").val(exp[4]);
  $("#editStatus").val(exp[5]);
  $("#editNama").val(exp[6]);
  $("#editNmmotor").val(exp[7]);
  $("#editIdBrand").val(exp[8]);
  $("#editIdMotor").val(exp[9]);
}

function editableBookings(param) {
    let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  console.log(exp[4]);
  console.log(exp[8]);
  console.log(exp[9]);
  console.log("Ini bagian member");
  $("#editIds").val(exp[0]);
  $("#editIdMembers").val(exp[1]);
  $("#editNoantris").val(exp[2]);
  $("#editTanggals").val(exp[3]);
  $("#editKeluhanBooks").val(exp[4]);
  $("#editStatuss").val(exp[5]);
  $("#editNamas").val(exp[6]);
  $("#editNmmotors").val(exp[7]);
  $("#idBrands").val(exp[8]);
  $("#idMotors").val(exp[9]);
}

function showBrand(str) {
  console.log('INI BRAND');
  if (str == "") {
      document.getElementById("motor").innerHTML= "";
      return;
    }
    const xhtp = new XMLHttpRequest();
    xhtp.onload = function(){
      document.getElementById("motor").innerHTML = this.responseText;
    }
    xhtp.open("GET", "panel/booking/ajax.php?q=" + str);
    xhtp.send();

}

function showBrands(str) {
  console.log('INI BRANDS');
  if (str == "") {
      document.getElementById("editIdMotor").innerHTML= "";
      return;
    }
    const xhtp = new XMLHttpRequest();
    xhtp.onload = function(){
      document.getElementById("editIdMotor").innerHTML = this.responseText;
    }
    xhtp.open("GET", "panel/booking/ajax.php?q=" + str);
    xhtp.send();

}

function showBrandss(str) {
  console.log('INI BRANDSSS');
  if (str == "") {
      document.getElementById("idMotors").innerHTML= "";
      return;
    }
    const xhtp = new XMLHttpRequest();
    xhtp.onload = function(){
      document.getElementById("idMotors").innerHTML = this.responseText;
    }
    xhtp.open("GET", "panel/booking/ajax.php?q=" + str);
    xhtp.send();

}

function detailPerbaikan(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  console.log(exp[1]);
  $("#detIdPerbaikan").val(exp[0]);
  $("#detIdAntrian").val(exp[1]);
  $("#detIdMember").val(exp[2]);
  $("#detIdKar").val(exp[3]);
  $("#detTotHarga").val(exp[4]);
  $("#detIsclear").val(exp[5]);
  $("#detIsinput").val(exp[6]);
  $("#detTglDatang").val(exp[7]);
  $("#detKeluhan").val(exp[8]);
  $("#detNama").val(exp[9]);
  $("#detNoHp").val(exp[10]);
  $("#detMotor").val(exp[11]);
  $("#detKaryawan").val(exp[12]);
}


function showMember(str) {
  console.log('INI GET MEMBER');
  if (str == "") {
      document.getElementById("service").innerHTML= "<em><b>Maaf, data service member ini tidak tersedia !</b></em>";
      return;
    }
    const xhtp = new XMLHttpRequest();
    xhtp.onload = function(){
      document.getElementById("service").innerHTML = this.responseText;
    }
    xhtp.open("GET", "panel/rekap/getajaxmember.php?q=" + str);
    xhtp.send();

}



