<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $tituloPagina; ?> - <?php echo $tituloSitio; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Prism.js: números de línea -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/line-numbers/prism-line-numbers.min.css" rel="stylesheet">
    <style>
        body { background-color: #5b7a99; }
        .panel-titulo { background-color: #a9b9cc; font-weight: bold; }

        /* Tema oscuro estilo Visual Studio Code */
        pre.vscode { background: #1e1e1e; color: #d4d4d4; border-radius: 6px; padding: 12px 12px 12px 3.8em; max-height: 480px; overflow: auto; font-size: 13px; }
        pre.vscode code { font-family: Consolas, "Courier New", monospace; }
        .token.comment { color: #6a9955; }
        .token.keyword, .token.boolean, .token.delimiter, .token.tag { color: #569cd6; }
        .token.string, .token.attr-value { color: #ce9178; }
        .token.function { color: #dcdcaa; }
        .token.variable, .token.attr-name { color: #9cdcfe; }
        .token.number { color: #b5cea8; }
        .token.class-name, .token.constant { color: #4ec9b0; }
        .token.punctuation, .token.operator { color: #d4d4d4; }
        .line-numbers .line-numbers-rows { border-right: 1px solid #444; }
    </style>
</head>
<body>
