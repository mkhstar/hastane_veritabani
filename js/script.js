function el(id) {
  return document.getElementById(id);
}
var birSutunSec = el("birSutunSec");
var andBtn = el("andBtn");
var orBtn = el("orBtn");
var notBtn = el("notBtn");
var equalBtn = el("equalBtn");
var lessBtn = el("lessBtn");
var lessEqualBtn = el("lessEqualBtn");
var greaterBtn = el("greaterBtn");
var greaterEqualBtn = el("greaterEqualBtn");
var silBtn = el("silBtn");
var degerInput = el("degerInput");
var degerEkleBtn = el("degerEkleBtn");
var pasteCondtions = el("pasteCondtions");
var selectForm = el("selectForm");
var multipleSutunSec = el("multipleSutunSec");
var tabloSecSelect = el("tabloSecSelect");
var distinctSelect = el("distinctSelect");
var responseTableSelect = el("responseTableSelect");
var tabloSecInsert = el("tabloSecInsert");
var tabloSecUpdate = el("tabloSecUpdate");
var whereForUpdateText = el("whereForUpdateText");

if (birSutunSec) {
  birSutunSec.addEventListener("change", () => {
    pasteCondtions.innerHTML += ` <h5 class='inline-text codeText' style='display: inline;'> ${birSutunSec.value} </h5>`;
    if (whereForUpdateText) {
      if (whereForUpdateText.style.visibility == 'hidden') {
        whereForUpdateText.style.visibility = 'visible';
      }
    }
    if (whereForDeleteText) {
      if (whereForDeleteText.style.visibility == 'hidden') {
        whereForDeleteText.style.visibility = 'visible';
      }
    }
  });

}
if (andBtn) {
  andBtn.addEventListener("click", () => {
    pasteCondtions.innerHTML += `<span  class="badge badge-primary" style='margin: 0 8px;'> AND </span>`;
  });
}

if (orBtn) {
  orBtn.addEventListener("click", () => {
    pasteCondtions.innerHTML += `<span  class="badge badge-primary" style='margin: 0 8px;'> OR </span>`;
  });
}

if (notBtn) {
  notBtn.addEventListener("click", () => {
    pasteCondtions.innerHTML += `<span  class="badge badge-primary" style='margin: 0 8px;'> NOT </span>`;
  });
}

if (equalBtn) {
  equalBtn.addEventListener("click", () => {
    pasteCondtions.innerHTML += `<span  class="badge badge-primary" style='margin: 0 8px;'> = </span>`;
  });
}

if (lessBtn) {
  lessBtn.addEventListener("click", () => {
    pasteCondtions.innerHTML += `<span  class="badge badge-primary" style='margin: 0 8px;'> < </span>`;
  });
}

if (lessEqualBtn) {
  lessEqualBtn.addEventListener("click", () => {
    pasteCondtions.innerHTML += `<span  class="badge badge-primary" style='margin: 0 8px;'> <= </span>`;
  });
}

if (greaterBtn) {
  greaterBtn.addEventListener("click", () => {
    pasteCondtions.innerHTML += `<span  class="badge badge-primary" style='margin: 0 8px;'> > </span>`;
  });
}

if (greaterEqualBtn) {
  greaterEqualBtn.addEventListener("click", () => {
    pasteCondtions.innerHTML += `<span  class="badge badge-primary" style='margin: 0 8px;'> >= </span>`;
  });
}

if (silBtn) {
  silBtn.addEventListener("click", () => {
    pasteCondtions.innerHTML = "";
  });
}

if (degerEkleBtn) {
  degerEkleBtn.addEventListener("click", () => {
    pasteCondtions.innerHTML += ` ${degerInput.value} `;
  });
}

if (selectForm) {
  selectForm.addEventListener("submit", e => {
    e.preventDefault();
    var tabloSecSelectValue = tabloSecSelect.value;
    var multipleSutunSecValue = getSelectValues(multipleSutunSec);

    if (multipleSutunSecValue.length == 0) {
      multipleSutunSecValue = "*";
    }
    if (distinctSelect.checked == false) {
      var query = "SELECT " +
        multipleSutunSecValue + " FROM " + tabloSecSelectValue;
      if (pasteCondtions.innerText.length > 0) {
        query += " WHERE " +
          pasteCondtions.innerText;
      }
    } else {
      var query = "SELECT DISTINCT " +
        multipleSutunSecValue + " FROM " + tabloSecSelectValue;
      if (pasteCondtions.innerText.length > 0) {
        query += " WHERE " +
          pasteCondtions.innerText;
      }
    }

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'backend/process.php?querySelect=querySelect&query=' + query, true);

    xhr.onload = function () {
      if (this.responseText.length == 133) {
        responseTableSelect.innerHTML = `<b>0 Satır Karşılık Alındı</b>`;

      } else {
        responseTableSelect.innerHTML = this.responseText;
      }

    }

    xhr.send();
    var sorguSelect = el("sorguSelect");
    sorguSelect.innerText = query;

  })
}

function getSelectValues(select) {
  var result = [];
  var options = select && select.options;
  var opt;

  for (var i = 0, iLen = options.length; i < iLen; i++) {
    opt = options[i];

    if (opt.selected) {
      result.push(opt.value || opt.text);
    }
  }
  return result;
}


function getSelectValuesWithDisabled(select) {
  var result = [];
  var options = select && select.options;
  var opt;

  for (var i = 0, iLen = options.length; i < iLen; i++) {
    opt = options[i];

    if (opt.selected || opt.disabled) {
      result.push(opt.value || opt.text);
    }
  }
  return result;
}



if (tabloSecSelect) {
  tabloSecSelect.addEventListener("change", () => {
    var fieldValue = tabloSecSelect.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'backend/process.php?tabloSectiSelect=tabloSectiSelect&fieldValue=' + fieldValue, true);

    xhr.onload = function () {
      multipleSutunSec.innerHTML = this.responseText;
      birSutunSec.innerHTML = this.responseText;
    }

    xhr.send();

  })
}

// END OF SELECT CODE


// START OF INSERT CODE

if (tabloSecInsert) {
  tabloSecInsert.addEventListener("change", () => {
    var fieldValue = tabloSecInsert.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'backend/process.php?tabloSectiInsert=tabloSectiInsert&fieldValue=' + fieldValue, true);

    xhr.onload = function () {
      multipleSutunSec.innerHTML = this.responseText;
      pasteElementsInModalInsert();

    }

    xhr.send();

  })
}

var pasteInsertElements = el("pasteInsertElements");
var girinValuesInsert = el("girinValuesInsert");
var modalGirinInsert = el("modalGirinInsert");
if (pasteInsertElements) {
  pasteElementsInModalInsert();

}
if (girinValuesInsert) {
  girinValuesInsert.addEventListener("click", () => {
    pasteElementsInModalInsert();
    $('#modalInsertValues').modal();
  })

}

function pasteElementsInModalInsert() {
  var insertElementsArray = getSelectValuesWithDisabled(multipleSutunSec);
  pasteInsertElements.innerHTML = '';
  insertElementsArray.forEach(e => {
    pasteInsertElements.innerHTML += "<h5>" +
      e + "<input id='" + e + "'class='float-right insertElementsInputs'>" + "</h5><hr>";
  });
}

if (modalGirinInsert) {
  modalGirinInsert.addEventListener("click", () => {
    var insertElementsInputs = document.getElementsByClassName('insertElementsInputs');
    var pasteOutputIdValuesInsert = el("pasteOutputIdValuesInsert");
    pasteOutputIdValuesInsert.innerHTML = '';
    pasteOutputIdValuesInsert.innerHTML = '<h4>Sütün <span class="float-right">Verilen Değer</span></h4><hr>';
    var valuesInsertArray = [];
    for (var i = 0; i < insertElementsInputs.length; i++) {
      // console.log(insertElementsInputs[i].value);
      pasteOutputIdValuesInsert.innerHTML += `
      <h5>${insertElementsInputs[i].id} <span class="float-right">${insertElementsInputs[i].value}</span></h5><hr>
     
      `;

      valuesInsertArray.push(insertElementsInputs[i].value);

    }
    $('#modalInsertValues').modal('hide');
    var sorguInsert = el("sorguInsert");
    sorguInsert.innerHTML = `
    <span style='color: red;'>INSERT INTO</span> ${tabloSecInsert.value} (${getSelectValuesWithDisabled(multipleSutunSec)}) <span style='color: red;'>VALUES</span> (${valuesInsertArray})
    `;
  });
}

var insertForm = el("insertForm");
if (insertForm) {
  insertForm.addEventListener("submit", e => {
    e.preventDefault();
    var sorguInsert = el("sorguInsert");
    var query = sorguInsert.innerText;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'backend/process.php?sorguInsertSubmit=sorguInsertSubmit&query=' + query, true);
    xhr.onload = function () {
      alert(this.responseText);
    }
    xhr.send();
  })
}

// END OF INSERT HERE

// START OF UPDATE HERE 

if (tabloSecUpdate) {
  tabloSecUpdate.addEventListener("change", () => {
    var fieldValue = tabloSecUpdate.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'backend/process.php?tabloSectiUpdate=tabloSectiUpdate&fieldValue=' + fieldValue, true);

    xhr.onload = function () {
      multipleSutunSec.innerHTML = this.responseText;
      pasteElementsInModalUpdate();

    }

    xhr.send();

  })
}

var pasteUpdateElements = el("pasteUpdateElements");
var girinValuesUpdate = el("girinValuesUpdate");
var modalGirinUpdate = el("modalGirinUpdate");
if (pasteUpdateElements) {
  pasteElementsInModalUpdate();

}
if (girinValuesUpdate) {
  girinValuesUpdate.addEventListener("click", () => {
    pasteElementsInModalUpdate();
    $('#modalUpdateValues').modal();
  })

}

function pasteElementsInModalUpdate() {
  var updateElementsArray = getSelectValues(multipleSutunSec);
  pasteUpdateElements.innerHTML = '';
  updateElementsArray.forEach(e => {
    pasteUpdateElements.innerHTML += "<h5>" +
      e + "<input id='" + e + "'class='float-right updateElementsInputs'>" + "</h5><hr>";
  });
}

if (modalGirinUpdate) {
  modalGirinUpdate.addEventListener("click", () => {
    var updateElementsInputs = document.getElementsByClassName('updateElementsInputs');
    var pasteOutputIdValuesUpdate = el("pasteOutputIdValuesUpdate");
    pasteOutputIdValuesUpdate.innerHTML = '';
    pasteOutputIdValuesUpdate.innerHTML = '<h4>Sütün <span class="float-right">Verilen Değer</span></h4><hr>';
    var valuesUpdateArray = [];
    for (var i = 0; i < updateElementsInputs.length; i++) {
      pasteOutputIdValuesUpdate.innerHTML += `
      <h5>${updateElementsInputs[i].id} <span class="float-right">${updateElementsInputs[i].value}</span></h5><hr>
     
      `;

      valuesUpdateArray.push(updateElementsInputs[i].value);

    }
    $('#modalUpdateValues').modal('hide');
    var sorguUpdate = el("sorguUpdate");
    sorguUpdate.innerHTML = '';
    sorguUpdate.innerHTML = `
    <span style='color: red;'>UPDATE</span> ${tabloSecUpdate.value} 
    `;
    var updateElementsInputs = document.getElementsByClassName('updateElementsInputs');

    for (var i = 0; i < updateElementsInputs.length; i++) {
      if (i == 0) {
        sorguUpdate.innerHTML += '<span style="color: red;"> SET </span>'
      }
      sorguUpdate.innerHTML += updateElementsInputs[i].id + ' = ' + updateElementsInputs[i].value;
      if (i != updateElementsInputs.length - 1) {
        sorguUpdate.innerHTML += ',';
      }
    }


    ;

  });
}

var updateForm = el("updateForm");
if (updateForm) {
  updateForm.addEventListener("submit", e => {
    e.preventDefault();
    var confirm = window.confirm("Güncellemek için Emin Misiniz?");
    if (confirm == true) {
      var sorguUpdate = el("sorguUpdate");
      var query = sorguUpdate.innerText + " " + whereForUpdateText.innerText + " " + pasteCondtions.innerText;
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'backend/process.php?sorguUpdateSubmit=sorguUpdateSubmit&query=' + query, true);
      xhr.onload = function () {
        alert(this.responseText);
      }
      xhr.send();
    }

  })
}

// END OF UPDATE HERE

// START OF DELETE HERE
var sorguDelete = el("sorguDelete");
var tabloSecDelete = el("tabloSecDelete");
if (tabloSecDelete) {
  tabloSecDelete.addEventListener("change", () => {
    var fieldValue = tabloSecDelete.value;
    sorguDelete.innerText = fieldValue;



  })
}


var deleteForm = el("deleteForm");
if (deleteForm) {
  deleteForm.addEventListener("submit", e => {
    e.preventDefault();
    var confirm = window.confirm("Silmek için Emin Misiniz?");
    if (confirm == true) {
      var sorguDelete = el("sorguDelete");
      var deleteFromText = el("deleteFromText");
      var query = deleteFromText.innerText + " " + sorguDelete.innerText + " " + whereForDeleteText.innerText + " " + pasteCondtions.innerText;
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'backend/process.php?sorguDeleteSubmit=sorguDeleteSubmit&query=' + query, true);
      xhr.onload = function () {
        alert(this.responseText);
      }
      xhr.send();
    }

  })
}

if (sorguDelete) {
  window.addEventListener("load", tableName);
}

function tableName() {
  var tabloSecDelete = el('tabloSecDelete');
  sorguDelete.innerText = tabloSecDelete.value;
}

// END OF DELETE HERE 

// START OF SERBEST UYGULAMA HERE


var serbestUygulamaForm = el("serbestUygulamaForm");
if (serbestUygulamaForm) {
  serbestUygulamaForm.addEventListener("submit", e => {
    e.preventDefault();
    var textSorguSerbest = el("textSorguSerbest");
    var query = textSorguSerbest.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'backend/process.php?querySerbest=querySerbest&query=' + query, true);

    xhr.onload = function () {
      if (this.responseText.length == 133 || this.responseText == 0) {
        responseGeneratedTableSerbest.innerHTML = `<b>0 Satır Karşılık Alındı</b>`;

      } else {
        responseGeneratedTableSerbest.innerHTML = this.responseText;
      }

    }

    xhr.send();
  });
}