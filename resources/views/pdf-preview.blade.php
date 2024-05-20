<!-- resources/views/components/pdf-preview.blade.php -->
@props(['url'])

<div>
    <iframe src="{{ $url }}" width="100%" height="600px">
        This browser does not support PDFs. Please download the PDF to view it: <a href="{{ $url }}">Download PDF</a>.
    </iframe>
</div>
