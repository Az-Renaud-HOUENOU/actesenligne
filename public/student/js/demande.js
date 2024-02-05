function afficherChamps(){
    document.getElementById('champsReleve').style.display='none';
    document.getElementById('champsReleve').style.display='none';
    document.getElementById('champsReleve').style.display='none';
    document.getElementById('champsReleve').style.display='none';
    document.getElementById('champsReleve').style.display='none';

    var typeActe=document.getElementById('typeActe').value;
    if(typeActe==='releve'){
        document.getElementById('champsReleve').style.display='block';
    }elseif(typeActe==='attestation'){
        document.getElementById('champsAttestation').style.display='block';
    }elseif(typeActe==='diplome'){
        document.getElementById('champsDiplome').style.display='block';
    }
}