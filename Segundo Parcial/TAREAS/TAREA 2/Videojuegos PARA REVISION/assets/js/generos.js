const URL_BASE='http://192.168.1.140/videojuegos_app/';

// GET api-genero.php
async function getGeneros(){
    const tbody=document.querySelector('#tablaGeneros');
    if(!tbody){
        return;
    }
    try{
        const response=await fetch(`${URL_BASE}api-genero.php`);
        const data=await response.json();
        tbody.innerHTML='';
        data.forEach(genero=>{
            const tr=document.createElement('tr');
            tr.innerHTML=`
                <td>${genero.id}</td>
                <td>${genero.nombre}</td>
            `;
            tbody.appendChild(tr);
        });
    }catch(error){
        console.error('Error al obtener los géneros: ',error);
    }
}

// GET api-genero.php?id
async function getGeneroPorId(id){
    try{
        const response=await fetch(`${URL_BASE}api-genero.php?id=${id}`);
        if(response.ok){
            const genero=await response.json();
            return genero;
        }else{
            console.log('Error al obtener el género: ',response.statusText);
        }
    }catch(error){
        console.error('Error al obtener el género: ',error);
    }
}
document.addEventListener('DOMContentLoaded',()=>{
    getGeneros();
});