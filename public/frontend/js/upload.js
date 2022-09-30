
        const wrap = document.querySelector(".wrap");
        const fileName = document.querySelector(".file-name");
        const defaultBtn = document.querySelector("#default-b");
        const customBtn = document.querySelector("#custom-b");
        const cancelBtn = document.querySelector("#cancel-b i");
        const img = document.querySelector("img");
        let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

        function defaultBtnA(){
        defaultBtn.click();
        }

        defaultBtn.addEventListener("change", function(){
        const file = this.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload = function(){
            const result = reader.result;
            img.src = result;
            wrap.classList.add("active");
            }
            cancelBtn.addEventListener("click", function(){
            img.src = "";
            wrap.classList.remove("active");
            })
            reader.readAsDataURL(file);
        }
        if(this.value){
            let valueStore = this.value.match(regExp);
            fileName.textContent = valueStore;
        }
        });