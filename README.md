# Travel Agency API

a Laravel APIs application for a travel agency.

## Features

1. A private (admin) endpoint to create new users. If you want, this could also be an artisan command, as
   you like. It will mainly be used to generate users for this exercise;
2. A private (admin) endpoint to create new travels;
3. A private (admin) endpoint to create new tours for a travel;
4. A private (editor) endpoint to update a travel;
5. A public (no auth) endpoint to get a list of paginated travels. It must return only public travels;
6. A public (no auth) endpoint to get a list of paginated tours by the travel slug (e.g. all the tours of the
   travel foo-bar). Users can filter (search) the results by priceFrom, priceTo, dateFrom (from that
   startingDate) and dateTo (until that startingDate). User can sort the list by price asc and desc. They will
   always be sorted, after every additional user-provided filter, by startingDate asc.

## Technologies Used

-   Laravel framework (version 10)
-   MySQL database management system
-   php-cs-fixer and larastan
-   Laravel Feature tests
