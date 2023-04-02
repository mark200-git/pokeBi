 function getDate(){
    const nowaData = new Date();
    const dateControl = document.getElementById('kontroler');
    kontroler.value = nowaData.getFullYear() + '-' + ('0'+nowaData.getMonth() + 1) + '-' + nowaData.getDay();
}
