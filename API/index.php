<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>api-TEST</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body>
        <script>
            fetch('product/read_all.php')
            .then(response => response.json())
            .then(data => {
                for(let i=0; i<data.length; i++) {
                    console.log(i);
                    console.log(data.length);
                    let div = document.createElement('div');
                    let textnode = document.createTextNode(naam);
                    div.appendChild(textnode);
                    document.body.appendChild(div);
                }
            })
            .catch(error => console.log('error is', error));
        </script>
    </body>
</html>