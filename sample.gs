function getData(sheetName) {
  var sheet = SpreadsheetApp.getActive().getSheetByName(sheetName);
  var rows = sheet.getDataRange().getValues();
  var keys = rows.splice(0, 1)[0];
  return rows.map(function(row) {
    var obj = {};
    row.map(function(item, index) {
      obj[String(keys[index])] = String(item);
    });
    return obj;
  });
}

function doGet(e) {
  var name = e.parameter.year;
  var data = getData(name);
  return ContentService.createTextOutput(JSON.stringify(data, null, 2))
  .setMimeType(ContentService.MimeType.JSON);
}
