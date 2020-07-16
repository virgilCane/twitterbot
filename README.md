# twitterbot
This Bot has 2 Components: The tweeter and the follower

The Tweeter script runs three times a day via a Cron job. It gets the headline and URL of the most recent article relating to Canadian sports news and tweets it.

The follower script must be run manually for the moment. It accepts a search query and then follows the first 200 accounts returned, skipping over accounts that you are already following / have sent a follow reqest to.

This makes bulk following user accounts much easier.

At the time of writing, the bot has accrued 68 followers with no/minimal manual intervention.
