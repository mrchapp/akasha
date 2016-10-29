# Akasha
PHP command line application to control Wink and other devices for Home
Automation.

# Prerequisites
PHP 5.3 or later
config.php (please contact developer for autoconf option)

# Command Line Arguments
```
akasha [device] [command] [extra parameters]
```

## General commands
* listdevices
* help

## Specific commands
Each device supports a specific set of commands. For instance, a light can be
powered on, off, or its state queried; a door lock can be locked, unlocked,
and again its state queried.

Commands supported by the device can be queried with listcommands. E.g.:
```
  $ akasha lightbulb listcommands
  Available commands:
    listcommands
    getstate
    poweron [intensity]
    poweroff [intensity]
```

Optional parameters for a given command are marked in squared brackets, and
required parameters are enclosed in angled bracked. Those parameters are
key-value pairs:

```
  $ akasha lightbulb poweron intensity=0.50
```
