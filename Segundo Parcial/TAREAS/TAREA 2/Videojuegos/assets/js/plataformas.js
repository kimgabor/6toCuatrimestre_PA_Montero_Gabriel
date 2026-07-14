const URL_BASE='http://192.168.1.117/videojuegos_app/';

// GET api-plataforma.php
async function getPlataformas(){
    const tbody=document.querySelector('#tablaPlataformas');
    if(!tbody){
        return;
    }
    try{
        const response=await fetch(`${URL_BASE}api-plataforma.php`);
        const data=await response.json();
        tbody.innerHTML='';
        data.forEach(plataforma=>{
            const tr=document.createElement('tr');
            tr.innerHTML=`
                <td>${plataforma.id}</td>
                <td>${plataforma.nombre}</td>
            `;
            tbody.appendChild(tr);
        });
    }catch(error){
        console.error('Error al obtener las plataformas: ',error);
    }
}

// GET api-plataforma.php?id=1
async function getPlataformaPorId(id){
    try{
        const response=await fetch(`${URL_BASE}api-plataforma.php?id=${id}`);
        if(response.ok){
            const plataforma=await response.json();
            return plataforma;
        }else{
            console.log('Error al obtener la plataforma: ',response.statusText);
        }
    }catch(error){
        console.error('Error al obtener la plataforma: ',error);
    }
}

// Llamadas de funciones y eventos
document.addEventListener('DOMContentLoaded',()=>{
    getPlataformas();
});