_AkashaComplete() {
  local cur

  COMPREPLY=()
  cur=${COMP_WORDS[COMP_CWORD]}

  if [ ${COMP_CWORD} -eq 1 ]; then
    # CANDIDATES are the devices
    readarray -s 1 -t CANDIDATES < <(akasha listdevices | cut -d\( -f1 | cut -b3-)
  elif [ ${COMP_CWORD} -eq 2 ]; then
    # CANDIDATES are the commands
    device=${COMP_WORDS[1]}
    readarray -s 1 -t CANDIDATES < <(akasha ${device} listcommands | cut -b3- | cut -d\  -f1)
  else
    # CANDIDATES are the arguments
    device=${COMP_WORDS[1]}
    command=${COMP_WORDS[2]}
    readarray -t CANDIDATES < <(akasha ${device} listcommands | cut -b3- | grep ^${command} | cut -d\  -f2- | tr -d '[]<>')
  fi
  COMPREPLY=($(compgen -W "$(echo ${CANDIDATES[@]})" -- $cur))

  return 0
}

complete -F _AkashaComplete akasha
