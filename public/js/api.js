
const form = document.querySelector('#form_api');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    const termino = document.querySelector('#api').value;
    console.log(termino);
    consultaApi(termino);

});

const consultaApi = (termino) => {
    fetch('api/'+termino)
    .then(resp => resp.json())
    .then( data => {
        console.log(data);
        const result = data;
        document.querySelector('#result').innerHTML = JSON.stringify(result,null,4)
    })
}

