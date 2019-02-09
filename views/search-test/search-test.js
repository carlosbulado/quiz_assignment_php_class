var tableOfTests;

(function(){
    setTimeout(function(){
        tableOfTests = document.getElementById('search-test-table');

        //var tests = [];
        //tests.push({ Name: 'Quiz 01', Questions: [] }, { Name: 'Quiz 02', Questions: [] });
        populateTable(tests);
    }, 500);
})();

function populateTable(tests)
{
    var colGroup = '';
    for (let test of tests)
    {
        var row = '<tr>';
        row += '<td>' + test.Name + '</td>';
        row += '<td>' + test.Questions.length + '</td>';
        row += '<td><button type="button">Edit</button></td>';
        row += '<td><button type="button">Remove</button></td>';
        row += '</tr>';
        colGroup += row;
    }
    if (colGroup)
    {
        colGroup = '<tr><td rowspan="4">No Rows</td></tr>';
    }
    tableOfTests.innerHTML = colGroup;
}
