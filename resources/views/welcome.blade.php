<!DOCTYPE html>
<html>
<head>
<style>
    .content-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100%;
    gap: 10px;
}

 .article{
    display: flex;
    flex-direction: column;
    width: 400px;
    height: 400px;
    font-size: 12px;
 }
</style>
</head>
<body>
<h1>Titles and Images for articles from https://edition.cnn.com/europe Webpage</h1>
<div class="content-container">
    @foreach ($articles as $article)
    <div class="article">
        {{ $article->title }}
        <img src= {{ $article->image }}  alt="srtilce"  height="70%" width="100%">
    </div>
     @endforeach
</div>

</body>
</html>