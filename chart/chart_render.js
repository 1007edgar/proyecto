function habitacionesmatrimoniales() {
//coge el id donde se va pintar el grafico en la vista de la pagina de inicio
  var ctx = document.getElementById("habitaciones-matrimoniales");
  // declaramos dos variables javascript que guardan informacion mandada desde controlador inicio
  //con el numero de camas matrimoniales y no
  ////son colores en formato rgb
  var MatrimonialesSI = Matrimoniales_si; //este es una variable php
  var MatrimonialesNO = Matrimoniales_no; //Este es una variable php

  data = {
    datasets: [
      {
        data: [MatrimonialesSI, MatrimonialesNO],
        backgroundColor: [

          "rgba(153, 102, 255, 0.2)",
          "rgba(255, 159, 64, 0.2)",

        ],
        borderColor: [
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
        ],
      },
    ],

    
    labels: ["Matrimoniales NO", "Matrimoniales SI"],
  };
  var myDoughnutChart = new Chart(ctx, {
    type: "doughnut",
    data: data,
  
  });
}

String.prototype.capitalize = function () {
  return this.charAt(0).toUpperCase() + this.slice(1);
};

function reservasdisponibles() {
  var ctx = document.getElementById("matrimonial");
  ctx.style.backgroundColor = "rgb(255,255,255)";
  let rawData = [
    {
      room_id: "1",
      room_number: "101",
      room_name: "Daimond Suite",
      room_type: "Disponible",
      room_featured: "1",
      room_price: "538.220",
      room_booked: "1",
      check_in_date: "2020-12-18",
      check_out_date: "2021-01-11",
      room_image: "3.jpg",
      room_floor: "2",
      room_view: "Beach",
      room_beds: "2",
      bed_type: "Double deluxe",
      room_capacity: "4",
      room_amenities: "breakfast, lunch, dinner, wifi",
    },
    
    {
      room_id: "6",
      room_number: "202",
      room_name: "Ocean View Suite",
      room_type: "No Disponible",
      room_featured: "0",
      room_price: "200.000",
      room_booked: "1",
      check_in_date: "2020-12-23",
      check_out_date: "2020-12-17",
      room_image: "1.jpg",
      room_floor: "2",
      room_view: "Ocean",
      room_beds: "3",
      bed_type: "Single Bed",
      room_capacity: "7",
      room_amenities: "Ocean View, Wifi, Double bathroom",
    },

    
    
  ];
  // Classify by types
  var dataList = {};
  rawData.forEach((room) => {
    var type = room["room_type"].capitalize();
    // console.log(type);
    if (dataList.hasOwnProperty(type)) {
      dataList[type]++;
      // console.log(dataList[type]);
    } else {
      dataList[type] = 1;
    }
  });

  data = [];
  labels = [];

  // dataList.sort();

  for (const [key, value] of Object.entries(dataList)) {
    labels.push(key);
    data.push(value);
  }

  console.log(labels);

  // data = {
  //     datasets: [{
  //         data: data,
  //         backgroundColor: ["#fd8c04","rgb(236, 88, 88)"],
  //     }],

  //     // These labels appear in the legend and in the tooltips when hovering different arcs
  //     // labels: labels
  // };

  var typeChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: labels,
      datasets: [
        {
          label: "DISPONIBILIDAD",
          data: data,
          backgroundColor: [
            "rgba(255, 39, 32, 0.2)",
            "rgba(233, 162, 235, 0.2)",

          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",

          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
            },
          },
        ],
      },
    },
  });
}
