require 'http'

class ProjectsController < ApplicationController
  def index
    json = HTTP.get('https://api.github.com/users/DuckThom/repos?sort=pushed').to_s

    @json_data = JSON.parse(json)
  end
end
