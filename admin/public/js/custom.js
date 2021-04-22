

$(document).ready(function () {
  $('#VisitorDt').DataTable();
  $('.dataTables_length').addClass('bs-select');
});

function getServicesData(){
  axios.get('/serviceget')
    .then(function (response) {
      var jsonData = response.data;
      $.each(jsonData, function (i, item) {
        $('<tr>').html(
          "<td><img class='table-img' src=" + jsonData[i].service_img + "></td>" +
          "<td>" + jsonData[i].service_name + "</td>" +
          "<td>" + jsonData[i].service_des + "</td>" +
          "<td><a href='' ><i class='fas fa-edit'></i></a></td>" +
          "<td><a href='' ><i class='fas fa-trash-alt'></i></a></td>"

        ).appendTo('#service_table')
      })
    }).catch(function (error) {

    });
}