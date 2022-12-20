console.log("yo from app.js");






//graphique
const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Big Mac', 'Pain au chocolat', 'Pates carbonaras'],
      datasets: [{
        label:'',
        data: [400, 250, 1200],
        borderWidth: false,
        hoverOffset:20,
        backgroudColor:
        ["#ff2d00",
        "#fcff1f",
        "#2fcf00",
        "#0c60ff",
        "#b20cff",]
      }]
    },
    options: {
        responsive:true,
        cutout:"90%",
        plugins:{
            legend:false,
        },
        layout:{
            padding:20,
        }
    }
  });


//size
function sliderChangeSize(val){
    document.getElementById("output").innerHTML = val;
}
document.getElementById('size').value =170;
//poids
function sliderChangeWeight(val){
    document.getElementById("outputBis").innerHTML = val;
}
document.getElementById('weight').value =70;



//modale
//const myModal = document.getElementById('myModal')
//const myInput = document.getElementById('myInput')

//myModal.addEventListener('shown.bs.modal', () => {
  //myInput.focus()
//})