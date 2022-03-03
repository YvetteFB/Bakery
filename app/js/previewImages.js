const input = document.getElementById('images');

if(input){
    input.addEventListener('change', () => {
        previewImages(input);
    })
}

const previewImages = (input) => {
    let counter = 0;
    while(counter < input.files.length){
    if(input.files && input.files[counter]){
        const reader = new FileReader();
        reader.onload = (event) => {
            const imgPath = event.currentTarget.result;
            const previews = document.getElementById('previews');
            const img = `<img class = "img-preview" src = "${imgPath}">`
            previews.insertAdjacentHTML('beforeend', img)
        }
        reader.readAsDataURL(input.files[counter]);
        counter += 1;
    }
    }
}