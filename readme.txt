Interview task:

Write a script in public/index.php which implements access
to service.php as a service endpoint.

1. Read the XML booking shell using GET request.
2. add a ResShell/ResGuests/ResGuest to the booking and POST it to the service
3. Using the response from the service, display 3 variants of ResShell/ResGuests information:
    a) display an updated guests information as a HTML table using PHP,
    b) display an updated guests information as a HTML table using jQuery and inline javascript
    c) display an updated guests information using XSLT transformation (PHP extension)

Use any composer dependency you like, no need to use HTTP frameworks, etc, just update index.php