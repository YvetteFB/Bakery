      const edit = document.querySelectorAll('.fa-edit');
      const erase = document.querySelectorAll('.fa-trash-alt');
      var table = document.querySelector('.content-table'), rIndex;
      var selectedRow = null;
      var rows = document.querySelector('.content-table').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
      
    
        for(var i = 0; i < table.rows.length; i++)
        {
           try{
              var x = rows[i].insertCell(-1);
              x.innerHTML =
             `<i class="fas fa-edit" id="fa-edit"></i>
              <i class="fas fa-trash-alt" id="fa-trash-alt"></i>`;
            }catch(e){
              console.log(e.message)   ;
            }

                document.addEventListener('click',function(e){
               if(e.target && e.target.id=='fa-edit' ){
                document.querySelector(".edit-form").style.display = "block";

                  for (i = 0; i < rows.length; i++) {
                    
                    
                  rows[i].onclick = function() {
                    selectedRow = (this.rowIndex + 1);
                    document.getElementById('name').value = rows[selectedRow].cells[0].innerText;
                    document.getElementById('price').value = rows[selectedRow].cells[1].innerText;
                    document.getElementById('image').value = rows[selectedRow].cells[2].innerText;
                    }
                  }
                  }
              });   
        }
      for(var i = 0; i < table.rows.length; i++){
          document.addEventListener('click',function(e){
            if(e.target && e.target.id=='fa-trash-alt'){
            for (i = 0; i < rows.length; i++) {
              rows[i].onclick = function() {
              selectedRow = (this.rowIndex);
              table.deleteRow(selectedRow);
              }    
            }
          }
        });
      }