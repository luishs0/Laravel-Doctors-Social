//import Chart from 'chart.js/auto';


// function getMessage() {

//   $baseUrl = 'http://127.0.0.1:8000'; 

//   axios.get(`${this.baseUrl}/api/profiles/${this.$route.params.slug}`).then(resp => {
//       this.doctor = resp.data.user

//       console.log(this.doctor);
//       this.loading = false;
//   })
// };


// (async function() {

//    const year = new Date(); 
//    let year1 = year.getFullYear(); 
   
//   const data = [
//     { year: year1-6, count: 10 },
//     { year: year1-5, count: 20 },
//     { year: year1-4, count: 15 },
//     { year: year1-3, count: 25 },
//     { year: year1-2, count: 22 },
//     { year: year1-1, count: 30 },
//     { year: year1, count: 28 },
//   ];

//   const data2 = [
//     { year: 'Gennaio', count: 10 },
//     { year: 'Febbraio', count: 20 },
//     { year: 'Marzo', count: 15 },
//     { year: 'Aprile', count: 25 },
//     { year: 'Maggio', count: 22 },
//     { year: 'Giugno', count: 30 },
//     { year: 'Luglio', count: 28 },
//     { year: 'Agosto', count: 28 },
//     { year: 'Settembre', count: 28 },
//     { year: 'Ottobre', count: 28 },
//     { year: 'Novembre', count: 28 },
//     { year: 'Dicembre', count: 28 },

//   ]

//   new Chart(
//     document.getElementById('message_for_year'),
//     {
//       type: 'bar',
//       data: {
//         labels: data.map(row => row.year),
//         datasets: [
//           {
//             label: 'messages by year',
//             data: data.map(row => row.count)
//           }
//         ]
//       }
//     }
//   );

  
//   new Chart(
//     document.getElementById('message_for_month'),
//     {
//       type: 'bar',
//       data: {
//         labels: data2.map(row => row.year),
//         datasets: [
//           {
//             label: 'messages by month',
//             data: data2.map(row => row.count)
//           }
//         ]
//       }
//     }
//   );

//   new Chart(
//     document.getElementById('feedback_for_year'),
//     {
//       type: 'bar',
//       data: {
//         labels: data.map(row => row.year),
//         datasets: [
//           {
//             label: 'feedback by year',
//             data: data.map(row => row.count)
//           }
//         ]
//       }
//     }
//   );

//   new Chart(
//     document.getElementById('feedback_for_month'),
//     {
//       type: 'bar',
//       data: {
//         labels: data2.map(row => row.year),
//         datasets: [
//           {
//             label: 'messages by month',
//             data: data2.map(row => row.count)
//           }
//         ]
//       }
//     }
//   );

//   new Chart(
//     document.getElementById('vote_for_year'),
//     {
//       type: 'bar',
//       data: {
//         labels: data.map(row => row.year),
//         datasets: [
//           {
//             label: 'average vote by month',
//             data: data.map(row => row.count)
//           }
//         ]
//       }
//     }
//   );

//   new Chart(
//     document.getElementById('vote_for_month'),
//     {
//       type: 'bar',
//       data: {
//         labels: data2.map(row => row.year),
//         datasets: [
//           {
//             label: 'average vote by month',
//             data: data2.map(row => row.count)
//           }
//         ]
//       }
//     }
//   );


// })();

