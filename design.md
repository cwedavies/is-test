# Design Notes

## Joined Data

I decided that upon User retrieval I would join in the associated User Role and
Address data. This is intended to minimize on follow-up requests to the
back-end. A single request should get you everything you might wish to know about
a user.

This does mess with the purity of the RESTful design, but it is a common pattern
use in the industry. Ideally, I would have include flags on the endpoints for
each sub-resource, so the API users may select whether they need the associated
data.

## Laravel

I have utilized some of the easy niceities offered by the Laravel framework,
including:

+ Validation on all end-points
+ Pagination for the user collection
+ Implicit model binding
