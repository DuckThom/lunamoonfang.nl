require 'http'

class ProjectsController < ApplicationController
  def index
    response = HTTP.get('https://api.github.com/users/DuckThom/repos?sort=pushed')

    if response.code == 200
      @json_data = JSON.parse(response.to_s)
    else
      @json_data = {}
    end

  end
end
