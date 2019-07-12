# oc-opening-hours-plugin

> Manage and display opening hours on your website.

## Features

This plugins allows you to store opening hours for multiple locations and display them on your website.

It makes use of the great [`spatie/opening-hours`](https://github.com/spatie/opening-hours) library. You have direct access to all of the library's features.

* Store opening hours for multiple locations
* Set opening hours for each day of the week
* Add exceptions for specific dates
* Display the opening hours on your website
* Schema.org compatible [example markup](components/openinghours/) provided


## `OpeningHours` component

This plugin provides only a single `OpeningHours` component. It can be used to display all opening hours for all locations.

```twig
[openingHours]
==
{# List all locations #}
{% for location in openingHours.locations %}
	{{ dump(location.openingHours.forWeek()) }}
{% endfor %}

{# If you have only a single location you can access it directly #}
{{ dump(openingHours.location.openingHours.forWeek()) }}

{# You can also access a specific location by its slug #}
{{ dump(openingHours.locationsBySlug['your-location'].openingHours.forWeek()) }}
```

Access the `openingHours` property on any location to have access to the full `spatie/opening-hours`
featureset as [documented in their README](https://github.com/spatie/opening-hours#openinghoursforweek-spatieopeninghoursopeninghoursforday).

```twig
{{ dump(location.openingHours.forWeek()) }}
{{ dump(location.openingHours.forWeekCombined()) }}
{{ location.openingHours.asStructuredData() | json_encode }}
{{ location.openingHours.forDay('monday') }}
{{ location.openingHours.isOpenOn('monday') ? 'open' : 'closed' }}
{{ location.openingHours.isClosedOn('monday') ? 'closed' : 'open' }}
{{ location.openingHours.forDate(date('2020-01-01')) }}
{{ location.openingHours.isOpenAt(date('2020-10-01')) ? 'open' : 'closed' }}
{{ location.openingHours.isOpen() ? "We're open!" : "Sorry, we're closed!" }}
{{ location.openingHours.isClosed() ? "Sorry, we're closed!" : "We're open!" }}
{{ "Open until " ~ location.openingHours.nextClose(date('now')).format('Y-m-d H:i') }}
{{ "We'll open again on " ~ location.openingHours.nextOpen(date('now')).format('Y-m-d H:i') }}
```

Checkout the [component's partials](components/openinghours/) for a demo implementation.



## Contributing

### Bugs and feature requests

If you found a bug or want to request a feature please file a GitHub issue.

### Pull requests

PRs are always welcome! Open them against the `master` branch.
If you plan a time consuming contribution please open an issue first and describe what changes you have in mind. 