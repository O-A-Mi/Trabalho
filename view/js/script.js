/**********MENU***********/
    function mudancaMenu(){
        var menu = document.getElementById('menu');
        if (menu.style.left === '0px'){
            fecharMenu();
        }else{
            abrirMenu();
        }
    }

    function abrirMenu(){
        document.getElementById('menu').style.left = '0';
    }

    function fecharMenu(){
        document.getElementById('menu').style.left = '-250px';
    }

/**********Tamanho das textarea's**********/
    function mudaTamanho(){
        var textarea = document.getElementById('textarea');
        textarea.style.height = 'auto';
        textarea.style.height = (textarea.scrollHeight + 2) + 'px';
    }

/**********Formata os decimais**********/
    function formataDecimal(x){
        let valor = x.value.replace(/[^\d,\.]/g, '');
            
        valor = valor.replace(',', '.');

        x.value = valor;
    }